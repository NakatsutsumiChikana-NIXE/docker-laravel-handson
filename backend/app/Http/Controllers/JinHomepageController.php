<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class JinHomepage extends Controller {
    //ホームページ　トップページ
    public function jin_homepage(Request $request) {
        return view('jin_homepage');
    }
}