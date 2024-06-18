<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeContact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_contact';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'info' => 'json',
    ];

    public function getBusinessCommunications()
    {
        return CafeContact::whereNull('deleted_at')->get();
    }

    // idを元にデータを探す
    public function searchBasedOnId($targetId)
    {
        return CafeContact::where('id', $targetId)->first();
    }
}
