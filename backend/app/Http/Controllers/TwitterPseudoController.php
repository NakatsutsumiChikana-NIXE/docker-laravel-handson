<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TwitterPseudoController extends Controller
{
    public function Setup(Request $request)
    {
        return view('TwitterPseudoHome');
    }

    // public function post(Request $request)
    // {
    //     return view('');
    // }
}