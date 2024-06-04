<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * テスト用ホームページ
 * 美容院のホームページ
*/
class BeautySalon extends Controller
{
    public function top()
    {
        return view('beauty_salon_top');
    }
}
