<?php

namespace App\Services;

use App\Models\CafeAdministrator;
use App\Models\CafeContact;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class ContactCreateService
{
    // 業務連絡保存
    public function saveContact($additionalContact, $searchId)
    {
        try {
            $cafeContact = new CafeContact;
            $cafeAdministrator = new CafeAdministrator();
            $userData = $cafeAdministrator->searchBasedOnId($searchId);

            $newContact['businessContact'] = $additionalContact;
            $newContact['author'] = $userData->name;
            $newContact['authorEmployeeId'] = $userData->employee_id;
            $cafeContact->info = $newContact;
            $cafeContact->save();

            return;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
