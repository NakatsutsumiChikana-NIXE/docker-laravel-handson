<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * テスト用ホームページ
 * カフェのホームページ
*/
class CafeController extends Controller
{
    public function home()
    {
        return view('cafe/home');
    }

    public function menu()
    {
        return view('cafe/menu');
    }
}
