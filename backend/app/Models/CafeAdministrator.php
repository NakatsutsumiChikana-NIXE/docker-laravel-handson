<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeAdministrator extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_administrator';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'employee_id',
        'name',
        'birthday',
        'sex',
        'password',
    ];

    public function searchForAccount()
    {
        return CafeAdministrator::whereNull('deleted_at')->get();
    }

    // ログイン時に使うデータを探す
    public function searchData($employeeId, $accountName, $password)
    {
        return CafeAdministrator::where('employee_id', $employeeId)
            ->where('name', $accountName)
            ->where('password', $password)
            ->first();
    }

    // idを元にデータを探す
    public function searchBasedOnId($targetId)
    {
        return CafeAdministrator::where('id', $targetId)->first();
    }

    // 同じ社員IDがあった
    public function searchIdAndNameMatch($id, $name)
    {
        return CafeAdministrator::where('employee_id', $id)
            ->where('name', $name)
            ->first();
    }

    // 社員IDを元にデータを探す
    public function searchBasedOnEmployeeId($targetEmployeeId)
    {
        return CafeAdministrator::where('employee_id', $targetEmployeeId)->first();
    }
}
