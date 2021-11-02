<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileInfoController;

use App\Http\Controllers\LikeController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/homefeed', [App\Http\Controllers\HomeFeedController::class, 'index'])->name('homefeed');

Route::get('/deletenotif/test/{thread}/{id}', [App\Http\Controllers\ThreadController::class, 'deletenotif'])->name('deletenotif');

Route::resource('/thread','App\Http\Controllers\ThreadController');

Route::resource('comment','App\Http\Controllers\CommentController',['only'=>['update','destroy']]);

Route::post('comment/create/{thread}','App\Http\Controllers\CommentController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}','App\Http\Controllers\CommentController@addReplyComment')->name('replycomment.store');


Route::get('/search', 'App\Http\Controllers\ThreadController@search')->name('search');

Route::get('/profile','App\Http\Controllers\profileInfoController@index')->name('profile');
Route::get('profile/{profile}','App\Http\Controllers\profileInfoController@show')->name('profile_show');
Route::POST('update','App\Http\Controllers\profileInfoController@edit');

Route::POST('vote','App\Http\Controllers\VoteController@vote')->name('vote');

Route::post('comment/like', 'App\Http\Controllers\LikeController@likeIt')->name('likeIt');
Route::post('comment/unLike', 'App\Http\Controllers\LikeController@unLikeIt')->name('unLikeIt');









