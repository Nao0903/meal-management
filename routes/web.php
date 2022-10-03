<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//以下はログイン機能を追加したことにより、TOPページをWelcomeでアクセスするようにするため。コメントアウトにしている
Route::get('/', 'MealsController@index');

//Route::resource('meals', 'MealsController');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


//ユーザー認証していれば、meal management を使用できる。
Route::group(['middleware' => ['auth']], function () {
    // ここに書かれたルーティングはログインユーザしかアクセスできない
    Route::resource('meals', 'MealsController');
    //Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);
    
});


