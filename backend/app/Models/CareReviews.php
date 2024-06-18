<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareReviews extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'care_reviews';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'info' => 'json',
    ];

    // 削除したことがないかつ削除者のデータが存在しないデータを取得
    public function searchReviews()
    {
        return CareReviews::whereNull('deleted_at')
            ->whereRaw("JSON_EXTRACT(info, '$.reasonForDeletion') IS NULL")->get();
    }

    public function searchBasedOnCommentId($commentId)
    {
        return CareReviews::where('id', $commentId)->first();
    }

    // 削除したデータを探す
    public function findDeletedData()
    {
        return CareReviews::whereRaw("JSON_EXTRACT(info, '$.reasonForDeletion')")->get();
    }
}
