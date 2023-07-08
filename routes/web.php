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

//ここから追記
use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->group(function() {
    Route::get('news/create', 'add');
});

//課題1：Routing

/*課題2 : ・書き方が複雑化したとしても、後々の見やすさ、わかりやすさがある
　　　　　・一つのcontrollerの中身としてまとめられるので管理しやすくなる
*/

//ここから課題3
/*
Route::controller(AAAController::class)->group(function() {
    Route::get('XXX','bbb');
});
*/

//ここから課題4
/*
use App\Http\Controllers\Admin\ProfileController;
Route::controller(profilecontroller::class->)prefix('admin')->group(function() {
    Route::get('profile/create','add');
    Route::get('profile/edit','edit');
})
*/



