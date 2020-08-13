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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'PostController@index');
//ここはpostsと言うふうにする{{ route('') }}を使う為
//{{ route('')}}を使う時は、Route::resouceにコントローラーの複数形を書く事とそれがかえるコントローラーでviewを返す事
// 同じアドレスから始まるものは、getが先
Route::get('/posts/search', 'PostController@search')->name('posts.search');

Route::resource('/posts', 'PostController');

Route::resource('/users', 'UserController');

Route::resource('/comments', 'CommentController')->middleware('auth');