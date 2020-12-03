<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileInfoController;

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

Route::resource('/thread','App\Http\Controllers\ThreadController');

Route::resource('comment','App\Http\Controllers\CommentController',['only'=>['update','destroy']]);

Route::post('comment/create/{thread}','App\Http\Controllers\CommentController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}','App\Http\Controllers\CommentController@addReplyComment')->name('replycomment.store');

Route::post('submit',[profileInfoController::class,'store']);