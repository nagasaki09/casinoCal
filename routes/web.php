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

Route::get('/home', function () {
});

//Auth::routes();

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
  // Registration Routes...
  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\RegisterController@register');

  Route::get('accountManage', 'accountManageController@index')->name('accountManage');
  Route::get('accountDelete/{id?}', 'UserController@deleteAccount');
   });

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {

});


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
