<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Services\ContactCreateService;
use App\Services\ContactDeleteService;
use App\Services\ContactEditService;
use App\Services\NoticeService;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class CafeAdministratorController extends Controller
{
    public function login()
    {
        return view('cafe/administrator/login', ['error' => '']);
    }

    // 最新情報ページに書き込む用のページ
    public function administrator(Request $request)
    {
        $allData = $request->all();
        $registrationService = new RegistrationService();

        // userDataがあるということは、ログイン情報を持っていないということなので情報を探す必要がある
        if (!empty($allData['userData'] ?? '')) {
            $allData = $registrationService->searchForUsers($allData['userData']);
        }
        $checkLog = $registrationService->checkLog($allData);

        // エラーがない場合は管理者画面へ
        if ($checkLog === true) {
            $userDataId = $registrationService->createData($allData);
            // 業務連絡
            $businessContacts = $registrationService->searchForBusinessContacts();
            // お知らせ
            $notice = $registrationService->searchForNotifications();

            return view('cafe/administrator/administrator', [
                'userData' => $userDataId,
                'businessContacts' => $businessContacts,
                'notices' => $notice
            ]);
        }

        // エラーがある場合は、ログイン画面へエラー表示させる
        return view('cafe/administrator/login', ['error' => $checkLog['errMsgMortgages']]);
    }

    // アカウント作成
    public function create()
    {
        return view('cafe/administrator/create', ['error' => '']);
    }

    // 登録処理
    public function registration(Request $request)
    {
        $registrationService = new RegistrationService();
        $saveAccount = $registrationService->saveAccount($request);
        
        // エラーがない場合はログイン画面へ
        if ($saveAccount === true) {
            return view('cafe/administrator/login');
        }

        // エラーがある場合は、新規アカウント作成画面へ
        return view('cafe/administrator/create', ['error' => $saveAccount]);
    }

    // 連絡事項を新規作成
    public function contactCreate(Request $request)
    {
        $allData = $request->all();
        $newContact = $allData['newContact'] ?? '';
        $userData = $allData['userData'];

        // 新規連絡事項を追加
        if (!empty($newContact)) {
            $contactCreateService = new ContactCreateService();
            $contactCreateService->saveContact($newContact, $userData);
        }

        return view('cafe/administrator/contactCreate', ['userData' => $userData]);
    }

    // 連絡事項の編集
    public function contactEdit(Request $request)
    {
        $contactEditService = new ContactEditService();
        $targetComment = $contactEditService->searchForEditedData($request->all());

        return view('cafe/administrator/contactEdit', ['comment' => $targetComment[0], 'editId' => $targetComment[1], 'userId' => $targetComment[2]]);
    }

    // 何も確認なしに削除は流石に怖いので、本当に削除してもいいか確認画面を作成
    public function contactDelete(Request $request)
    {
        $dataAll = $request->all();
        $contactDeleteService = new ContactDeleteService();
        $deleteCommentId = $dataAll['userAndCommentId'] ?? '';

        // deleteCommentIdが存在するということは、削除しても良いということ
        if (!empty($deleteCommentId)) {
            $dataToBeDeleted = $contactDeleteService->deleteTargetData($deleteCommentId);
            return view('cafe/administrator/administrator', [
                'userData' => $dataToBeDeleted['userId'],
                'businessContacts' => $dataToBeDeleted['businessContacts'],
                'notices' => $dataToBeDeleted['notices']
            ]);
        }

        // 削除確認画面を表示するときに必要なデータを取得
        $dataToBeDeleted = $contactDeleteService->searchForDataToDelete($dataAll);

        return view('cafe/administrator/contactDelete', [
                'userId' => $dataToBeDeleted['userId'],
                'commentId' => $dataToBeDeleted['commentId'],
                'author' => $dataToBeDeleted['author'],
                'changer' => $dataToBeDeleted['changer'],
                'businessContact' => $dataToBeDeleted['businessContact'],
                'authorEmployeeId' => $dataToBeDeleted['authorEmployeeId'],
            ]);
    }

    // お知らせ作成
    public function createNotice(Request $request)
    {
        $dataAll = $request->all();
        if (!empty($dataAll['newNotice'] ?? '')) {
            $noticeService = new NoticeService();
            $dataAll = $noticeService->noticeSave($dataAll);
        }

        return view('cafe/administrator/createNotice', ['userData' => $dataAll['userId']]);
    }

    // お知らせ編集
    public function editNotice(Request $request)
    {
        $dataAll = $request->all();
        // dd($dataAll);
        $noticeService = new NoticeService();
        $editNotice = $dataAll['editNotice'] ?? '';
        // editNoticeが存在していないかったらannounceEditingUpcomingが動く
        $dataToBeEdited = empty($editNotice) ? $noticeService->announceEditingUpcoming($dataAll) : $noticeService->noticeEdit($dataAll);

        return view('cafe/administrator/editNotice', [
            'userId' => $dataToBeEdited['userId'],
            'editId' => $dataToBeEdited['editId'],
            'noticeContent' => $dataToBeEdited['noticeContent'],
        ]);
    }

    // お知らせ削除
    public function deleteNotice(Request $request)
    {
        $dataAll = $request->all();

        $noticeService = new NoticeService();

        if (!empty($dataAll['deleteId'] ?? '')) {
            $displayData = $noticeService->noticeDelete($dataAll);
            // dd($displayData);
            return view('cafe/administrator/administrator', [
                'userData' => $displayData['userId'],
                'businessContacts' => $displayData['businessContacts'],
                'notices' => $displayData['notices']
            ]);
        }
        // dd('出た');
        $dataToBeDeleted = $noticeService->searchNoticeDelete($dataAll);
        // dd($dataToBeDeleted);
        return view('cafe/administrator/deleteNotice', [
            'userId' => $dataToBeDeleted['userId'],
            'userAndCommentId' => $dataToBeDeleted['userAndCommentId'],
            'author' => $dataToBeDeleted['author'],
            'changer' => $dataToBeDeleted['changer'],
            'noticeContent' => $dataToBeDeleted['noticeContent']
        ]);
    }
}
