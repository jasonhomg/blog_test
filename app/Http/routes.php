<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@create');
Route::get('show/{id}' , 'HomeController@show');
Route::post('show/update', 'HomeController@update');
Route::get('delete/{id}' , 'HomeController@delete');
Route::get('regist' , 'MemberController@regist')->name('regist');
Route::post('regist' , 'MemberController@regist_member');
Route::get('regist/login' , 'MemberController@loginpage')->name('loginpage');
Route::post('regist/login' , 'MemberController@login');
Route::get('regist/logout' , 'MemberController@logout');
Route::get('reply/{id}/{replyId?}' , 'ReplyController@reply')->name('reply');
Route::post('reply/update' , 'ReplyController@replyUpdate');
Route::post('reply/insert' , 'ReplyController@replyInsert');
Route::get('replyDelete/{id}' , 'ReplyController@replyDelete');