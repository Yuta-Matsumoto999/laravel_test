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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('question/mypage', 'QuestionController@showMypage')->name('question.showMypage');
Route::resource('question', 'QuestionController');
Route::post('question/createConfirm', 'QuestionController@createConfirm')->name('question.createConfirm');
Route::post('question/comment/{id}', 'QuestionController@commentCreate')->name('question.comment');
Route::post('question/updateConfirm/{id}', 'QuestionController@updateConfirm')->name('question.updateConfirm');

Route::get('/login/twitter', 'Auth\SocialController@getTwitterAuth');
Route::get('/login/twitter/callback', 'Auth\SocialController@etTwitterAuthCallback');
