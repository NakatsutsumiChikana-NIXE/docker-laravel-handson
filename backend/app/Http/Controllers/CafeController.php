<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * テスト用ホームページ
 * 美容院のホームページ
*/
class CafeController extends Controller
{
    public function home()
    {
        return view('cafe/home');
    }

    public function menu()
    {
        // dd('止まる');
        return view('cafe/menu');
    }
}
