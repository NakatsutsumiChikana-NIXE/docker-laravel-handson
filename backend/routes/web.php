<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', 'App\Http\Controllers\Controller2@index')->name('profile');

Route::get('/test', function () {
     return view('test');
});

Route::get('/manga', 'App\Http\Controllers\Controller2@manga')->name('manga');

Route::get('/calc', 'App\Http\Controllers\Controller2@calc');

Route::post('/total', 'App\Http\Controllers\Controller2@total');

Route::get('/quiz', 'App\Http\Controllers\Controller2@quiz');

Route::post('/answer_dog', 'App\Http\Controllers\Controller2@answer_dog');

Route::get('/omikuji', 'App\Http\Controllers\Controller2@omikuji');

Route::post('/omikuji_answer', 'App\Http\Controllers\Controller2@omikuji_answer');

Route::get('/blood_type', 'App\Http\Controllers\Controller2@blood_type');

Route::post('/blood_type_answer', 'App\Http\Controllers\Controller2@blood_type_answer');

Route::get('/anime_title', 'App\Http\Controllers\Controller2@anime_title');

Route::post('/title_name', 'App\Http\Controllers\Controller2@title_name');

Route::get('/manga_top', 'App\Http\Controllers\Controller2@manga_top');

Route::post('/manga_action', 'App\Http\Controllers\Controller2@manga_action');

Route::get('/dinner_menu', 'App\Http\Controllers\Controller2@dinner_menu');

Route::post('/dinner_pork', 'App\Http\Controllers\Controller2@dinner_pork');

Route::get('/Lucky_color', 'App\Http\Controllers\Controller2@Lucky_color');

Route::post('/Lucky', 'App\Http\Controllers\Controller2@Lucky');

Route::get('/RPG_Top', 'App\Http\Controllers\Controller2@RPG_Top');

Route::post('/RPG_fight', 'App\Http\Controllers\Controller2@RPG_fight');

Route::get('/Setup', 'App\Http\Controllers\TwitterPseudoController@Setup')->name('Setup');
Route::post('/SetupConfirmation', 'App\Http\Controllers\TwitterPseudoController@Confirmation')->name('Confirmation');
