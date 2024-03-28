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
//ホームページ作成
Route::get('/welcome', 'App\Http\Controllers\Controller2@index')->name('profile');

Route::get('/new', 'App\Http\Controllers\Controller2@new')->name('new');

Route::post('/new_answer', 'App\Http\Controllers\Controller2@new_answer')->name('new_answer');

Route::post('/bulletin', 'App\Http\Controllers\Controller2@bulletin')->name('bulletin');

Route::get('/seve', 'App\Http\Controllers\Controller2@seve')->name('seve');

Route::get('/change', 'App\Http\Controllers\Controller2@change')->name('change');

Route::put('/change_page', 'App\Http\Controllers\Controller2@change_page')->name('change_page');

Route::put('/change_ansewr', 'App\Http\Controllers\Controller2@change_ansewr')->name('change_ansewr');

Route::post('/welcome', 'App\Http\Controllers\Controller2@delete')->name('delete');
//new掲示板
Route::get('/bulletin_board', 'App\Http\Controllers\Bulletin_boardController@bulletin_board')->name('bulletin_board');

Route::post('/save', 'App\Http\Controllers\Bulletin_boardController@save')->name('save');

Route::post('/verification', 'App\Http\Controllers\Bulletin_boardController@verification')->name('verification');

Route::post('/uplopad', 'App\Http\Controllers\Bulletin_boardController@uplopad')->name('uplopad');



Route::get('/test', function () {
     return view('test');
});

Route::get('/manga', 'App\Http\Controllers\Controller2@manga')->name('manga');

Route::get('/calc', 'App\Http\Controllers\Controller2@calc')->name('calc');

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
//ホラーゲーム
Route::get('/horror_top', 'App\Http\Controllers\Controller2@horror_top')->name('horror_top');

Route::post('/horror', 'App\Http\Controllers\Controller2@horror_route')->name('horror_route');

Route::post('/horror_danger', 'App\Http\Controllers\Controller2@horror_danger')->name('horror_danger');

Route::get('book', 'BookController@index')->name('book.index');

Route::post('book', 'BookController@store')->name('book.store');
//追加課題DBに質問を入れて管理
//topページ
Route::get('/question_top', 'App\Http\Controllers\QuestionController@question_top')->name('question_top');
//saveから戻った時用
Route::put('/question_top', 'App\Http\Controllers\QuestionController@question_top')->name('question_top');

//問題作成ページ
Route::get('/question_create', 'App\Http\Controllers\QuestionController@question_create')->name('question_create');
Route::put('/question_create', 'App\Http\Controllers\QuestionController@question_create')->name('question_create');

//save
Route::put('/question_save', 'App\Http\Controllers\QuestionController@question_save')->name('question_save');

//問題出題ページ
Route::post('/question_display', 'App\Http\Controllers\QuestionController@question_display')->name('question_display');

Route::post('/question_answer', 'App\Http\Controllers\QuestionController@question_answer')->name('question_answer');

Route::post('/correct_answer_rate', 'App\Http\Controllers\QuestionController@correct_answer_rate')->name('correct_answer_rate');

Route::get('/question_production_verification', 'App\Http\Controllers\QuestionController@question_production_verification')->name('question_production_verification');
//編集
Route::put('/question_edit', 'App\Http\Controllers\QuestionController@question_edit')->name('question_edit');


//テスト用
Route::get('/test', 'App\Http\Controllers\TestController@test')->name('test');
Route::put('/test', 'App\Http\Controllers\TestController@post')->name('post');
