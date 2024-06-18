<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeNews extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_news';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'info' => 'json',
    ];

    // deleted_atがnullのものつまり、削除されていないデータを取得
    public function getNotice()
    {
        return CafeNews::whereNull('deleted_at')->get();
    }

    // コメントIDを元にお知らせを探す
    public function searchBasedOnId($commentId)
    {
        return CafeNews::where('id', $commentId)->first();
    }
}
