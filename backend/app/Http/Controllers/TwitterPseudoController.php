<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TwitterPseudoController extends Controller
{
    public function setup(Request $request)
    {
        return view('TwitterPseudoHome');
    }

   public function confirmation(Request $request)
   {
       $setup = new Setup;
       //name属性が'imageup'のinputタグをファイル形式に、画像をpublic/avatarに保存
       //$image_path = $request->file('imageup')->store('public/avatar/');
       $username = $request->name;
       $birhday = $request->birthday;
       $comment = $request->comment;
        dd($image_path, $username, $birhday, $comment);

       $setup->image_path = image_path($image_path);
       $setup->name = $username;
       $setup->birthday = $birhday;
       $setup->comment = $comment;

       $setup->save();
   }
}