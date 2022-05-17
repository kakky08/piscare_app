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
use App\Http\Controllers\ProfileController;
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
    Route::get('/shops', 'Admin\ShopController@register')->name('shops');
    Route::get('/shopsArea', 'Admin\ShopController@registerArea')->name('shopsArea');
    Route::get('/recipes', 'Admin\RecipeController@register')->name('recipes');

});

/**
 * 楽天レシピ取得に関するルーティング
 */

Route::prefix('rakuten')->name('rakuten')->middleware('auth:admin')->group(function () {
    Route::get('/', 'RakutenController@get_rakuten_items');
    Route::get('/index', 'RakutenController@index')->name('.index');
});

/**
 * マイページに関するルーティング
 */


// Homeに関するルーティング

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/{move}', 'HomeController@moveMonth')->name('move');
    Route::get('/select/{select}', 'HomeController@selectDay')->name('select');
});

// 習慣の記録に関するルーティング

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

// Settingに関するルーティング
// Route::prefix('setting')->name('setting.')->group(function(){
//     Route::get('/', 'SettingController@index')->name('index');

// });



// プロフィール
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function()
{
    Route::get('/{name}', 'ProfileController@show')->name('show');
    Route::get('/{name}/likes', 'ProfileController@likes')->name('likes');
    Route::get('/{name}/followings', 'ProfileController@followings')->name('followings');
    Route::get('/{name}/followers', 'ProfileController@followers')->name('followers');
    Route::post('/', 'RecordController@storeBreakfast')->name('store');
});
// 設定
Route::prefix('setting')->name('setting.')->middleware('auth')->group(function()
{
    Route::get('/', 'SettingController@index')->name('index');
    Route::post('/icon', 'SettingController@icon')->name('icon');
});

// プライバシー
Route::prefix('privacy')->name('privacy.')->middleware('auth')->group(function () {
    Route::get('/', 'PrivacyController@index')->name('index');
});

Route::resource('mypage', 'MyPageController', ['only' => ['index',]]);
Route::resource('user', 'UserController', ['only' => ['show', ]]);

/**
 * フォロー、フォロワーに関するルーティング
 */
Route::get('/{id}/followings', 'UserController@followings')->name('followings');
Route::get('/{id}/followers', 'UserController@followers')->name('followers');
Route::put('user/{id}/follow', 'UserController@follow')->name('follow')->middleware('auth');
Route::delete('user/{id}/follow', 'UserController@follow')->name('follow')->middleware('auth');



/**
 * 投稿レシピページに関するルーティング
 */
Route::resource('postRecipe', 'PostRecipeController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);

/**
 * レシピの投稿に関するルーティング
 */
Route::resource('post', 'PostController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::resource('registerName', 'PostRecipeNameController', ['only' => ['create', 'store']]);
Route::resource('materialCreate', 'MaterialCreateController', ['only' => ['create', 'edit', 'index', 'store', 'update']]);
Route::resource('procedure', 'ProcedureController', ['only' => ['create', 'edit', 'update', 'store', 'index' ]]);

Route::get('materialCreate/1/data', 'MaterialCreateController@getDate')->name('materialCreate.data');
Route::get('materialCreate/back/{materialCreate}', 'MaterialCreateController@back')->name('materialCreate.back');
Route::post('materialCreate/peopleUpdate', 'MaterialCreateController@updatePeople')->name('materialCreate.updatePeople');
Route::post('materialCreate/storeSeasoning', 'MaterialCreateController@storeSeasoning')->name('materialCreate.storeSeasoning');
Route::post('materialCreate/updateSeasoning', 'MaterialCreateController@updateSeasoning')->name('materialCreate.updateSeasoning');

Route::get('users', function () {
    return App\User::all();
});
/**
 * お店検索に関するルーティング
 */
// Route::resource('shops', 'SearchShopController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);
Route::get('shops/{page?}', 'SearchShopController@index')->name('shops.index');
Route::get('shops/search', 'SearchShopController@search')->name('shops.search');



/**
 * レシピページに関するルーティング
 */
Route::resource('recipes', 'RecipeController', ['only' => ['index', 'show']]);
Route::prefix('recipes')->name('recipes.')->middleware('auth')->group(function()
{
    Route::get('/category/{recipe}/', 'RecipeController@category')->name('category');
    Route::get('/search', 'RecipeController@search')->name('search');
    /** いいね機能のルーティング **/
    Route::put('/{recipe}/like', 'RecipeController@like')->name('like');
    Route::delete('/{recipe}/like', 'RecipeController@unlike')->name('unlike');

});





/**
 * その他
 */

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
