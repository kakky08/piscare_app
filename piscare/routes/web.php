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

//TODO ミドルウェアの記述

// use Illuminate\Routing\Route;

use App\Http\Controllers\MaterialCreateController;
use App\Http\Controllers\PostRecipeNameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::prefix('login')->name('login.')->group(function(){
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::prefix("register")->name('register.')->group(function(){
    Route::get('/{provider}', 'Auth\RegisterController@indexProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'HotpepperController@index');
Route::get('/calendar', 'CalendarController@index');
Route::get('/calendar/{select}', 'CalendarController@show');

// マイページ
Route::resource('mypage', 'MyPageController', ['only' => ['index',]]);
Route::resource('user', 'UserController', ['only' => ['show', ]]);
Route::get('/{id}/followings', 'UserController@followings')->name('followings');
Route::get('/{id}/followers', 'UserController@followers')->name('followers');
Route::put('user/{id}/follow', 'UserController@follow')->name('follow')->middleware('auth');
Route::delete('user/{id}/follow', 'UserController@follow')->name('follow')->middleware('auth');


Route::resource('recipe', 'RecipeController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('postRecipe', 'PostRecipeController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('post', 'PostController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('shops', 'SearchShopController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('registerName', 'PostRecipeNameController', ['only' => ['create', 'store']]);
Route::resource('materialCreate', 'MaterialCreateController', ['only' => ['create', 'edit']]);

Route::get('/home', 'HomeController@index')->name('home');
