<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', 'App\Http\Controllers\Controller2@index')->name('profile');

Route::get('/test', function () {
     return view('test');
});

Route::get('/manga', 'App\Http\Controllers\Controller2@manga')->name('manga');

Route::get('/calc', 'App\Http\Controllers\Controller2@calc');

Route::post('/total', 'App\Http\Controllers\Controller2@total');

Route::get('/quiz', 'App\Http\Controllers\Controller2@quiz');

Route::post('/answer_dog', 'App\Http\Controllers\Controller2@answer_dog');

Route::get('/omikuji', 'App\Http\Controllers\Controller2@omikuji');

Route::post('/omikuji_answer', 'App\Http\Controllers\Controller2@omikuji_answer');

Route::get('/blood_type', 'App\Http\Controllers\Controller2@blood_type');

Route::post('/blood_type_answer', 'App\Http\Controllers\Controller2@blood_type_answer');

Route::get('/anime_title', 'App\Http\Controllers\Controller2@anime_title');

Route::post('/title_name', 'App\Http\Controllers\Controller2@title_name');

Route::get('/manga_top', 'App\Http\Controllers\Controller2@manga_top');

Route::post('/manga_action', 'App\Http\Controllers\Controller2@manga_action');

Route::get('/dinner_menu', 'App\Http\Controllers\Controller2@dinner_menu');

Route::post('/dinner_pork', 'App\Http\Controllers\Controller2@dinner_pork');

Route::get('/Lucky_color', 'App\Http\Controllers\Controller2@Lucky_color');

Route::post('/Lucky', 'App\Http\Controllers\Controller2@Lucky');

Route::get('/RPG_Top', 'App\Http\Controllers\Controller2@RPG_Top');

Route::post('/RPG_fight', 'App\Http\Controllers\Controller2@RPG_fight');

Route::get('/Setup', 'App\Http\Controllers\TwitterPseudoController@Setup')->name('Setup');
Route::post('/SetupConfirmation', 'App\Http\Controllers\TwitterPseudoController@Confirmation')->name('Confirmation');

Route::get('/beauty_salon_top', 'App\Http\Controllers\BeautySalonController@top');

// カフェホームページ
Route::get('/cafe_top', 'App\Http\Controllers\CafeController@home');
// メニュー
Route::get('/cafe_menu', 'App\Http\Controllers\CafeController@menu')->name('menu');
// お知らせ
Route::get('/cafe_news', 'App\Http\Controllers\CafeController@news');
// アクセス方法
Route::get('/cafe_access', 'App\Http\Controllers\CafeController@access');
// 口コミ
Route::post('/cafe_reviews', 'App\Http\Controllers\CafeController@reviews');

// 学習用 管理者画面login画面
Route::get('/cafe_administrator/login', 'App\Http\Controllers\administrator\CafeAdministratorController@login');
// 書き込み画面
Route::post('/cafe_administrator', 'App\Http\Controllers\administrator\CafeAdministratorController@administrator');
// 管理者 アカウント作成画面
Route::get('/cafe_administrator/create_account', 'App\Http\Controllers\administrator\CafeAdministratorController@create')->name('create');
// 登録処理
Route::post('/cafe_administrator/registration', 'App\Http\Controllers\administrator\CafeAdministratorController@registration');
// 業務連絡作成
Route::post('/cafe_administrator/contact_create', 'App\Http\Controllers\administrator\CafeAdministratorController@contactCreate');
// 業務連絡編集
Route::post('/cafe_administrator/contact_edit', 'App\Http\Controllers\administrator\CafeAdministratorController@contactEdit');
// 業務連絡削除
Route::post('/cafe_administrator/contact_delete', 'App\Http\Controllers\administrator\CafeAdministratorController@contactDelete');
// お知らせ作成
Route::post('/cafe_administrator/create_notice', 'App\Http\Controllers\administrator\CafeAdministratorController@createNotice');
// お知らせ編集
Route::post('/cafe_administrator/edit_notice', 'App\Http\Controllers\administrator\CafeAdministratorController@editNotice');
// お知らせ削除
Route::post('/cafe_administrator/delete_notice', 'App\Http\Controllers\administrator\CafeAdministratorController@deleteNotice');
// お客さんのレビュー
Route::post('/cafe_administrator/reviews', 'App\Http\Controllers\administrator\CafeAdministratorController@reviews');
// お客さんのレビューを削除
Route::post('/cafe_administrator/reviews_delete', 'App\Http\Controllers\administrator\CafeAdministratorController@reviewsDelete');
// 削除したレビューを確認
Route::post('/cafe_administrator/deleted_review', 'App\Http\Controllers\administrator\CafeAdministratorController@deletedReview');
