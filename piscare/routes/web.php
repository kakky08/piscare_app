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


// ログイン

// 新規登録

// ホーム

// マイページ

// 投稿レシピ一覧

// レシピ一覧

// レシピ投稿


Auth::routes();
Route::prefix('login')->name('login.')->group(function(){
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::prefix("register")->name('register.')->group(function(){
    Route::get('/{provider}', 'Auth\RegisterController@indexProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});

/**
 *  Admin 認証不要
 */
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', function(){
        return redirect('admin/home');
    });
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Admin\LoginController@login')->name('login');
});

/**
 *  Admin ログイン後
 */

Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');
    Route::get('/home', 'Admin\HomeController@index')->name('home');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'HotpepperController@index');
Route::get('/calendar', 'CalendarController@index')->name('calendar.index');
Route::get('/calendar/{select}', 'CalendarController@show');

// マイページ
Route::resource('mypage', 'MyPageController', ['only' => ['index',]]);
Route::resource('user', 'UserController', ['only' => ['show', ]]);
Route::get('/{id}/followings', 'UserController@followings')->name('followings');
Route::get('/{id}/followers', 'UserController@followers')->name('followers');
Route::put('user/{id}/follow', 'UserController@follow')->name('follow')->middleware('auth');
Route::delete('user/{id}/follow', 'UserController@follow')->name('follow')->middleware('auth');


// レシピ投稿
Route::resource('recipes', 'RecipeController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('postRecipe', 'PostRecipeController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('post', 'PostController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('shops', 'SearchShopController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('registerName', 'PostRecipeNameController', ['only' => ['create', 'store']]);
Route::resource('materialCreate', 'MaterialCreateController', ['only' => ['create', 'edit', 'index', 'store', 'update']]);
Route::resource('editProcedure', 'EditProcedureController', ['only' => ['create', 'edit', 'update', 'store', 'index' ]]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test'. 'HotpepperController@index')->name('test');

Route::resource('record', 'RecordController', ['only' => ['store', 'update', 'destroy']]);

Route::prefix("breakfast")->name('breakfast.')->group(function () {
    Route::post('/', 'RecordController@storeBreakfast')->name('store');
    Route::post('update', 'RecordController@updateBreakfast')->name('update');
});
Route::prefix("lunch")->name('lunch.')->group(function () {
    Route::post('/', 'RecordController@storeLunch')->name('store');
    Route::post('update', 'RecordController@updateLunch')->name('update');
});
Route::prefix("dinner")->name('dinner.')->group(function () {
    Route::post('/', 'RecordController@storeDinner')->name('store');
    Route::post('update', 'RecordController@updateDinner')->name('update');
});

Route::get('/rakuten', 'RakutenController@get_rakuten_items')->name('rakuten');
Route::get('/rakuten/index', 'RakutenController@index')->name('rakuten.index');

/**
 * いいね機能のルーティング
 */
// RecipeLike
Route::prefix('recipes')->name('recipes.')->group(function()
{
    Route::put('/{recipe}/like', 'RecipeController@like')->name('like')->middleware('auth');
    Route::delete('/{recipe}/like', 'RecipeController@unlike')->name('unlike')->middleware('auth');

});
