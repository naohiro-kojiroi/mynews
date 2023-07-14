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
Route::controller(NewsController::class)->prefix('admin')->name('adomin.')->middleware('auth')->group(function() {
    Route::get('news/create', 'add')->name('news.sdd');
    Route::post('news/create','create')->name('news.create');
    //課題追記13
    Route::post('profile/creat','add')->name('profile.create');
    Route::post('profile/edit','add')->name('profile.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
