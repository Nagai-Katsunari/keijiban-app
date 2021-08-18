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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/threads', 'App\Http\Controllers\ThreadController@index')->name('threads');

Route::get('/threads/create', 'App\Http\Controllers\ThreadController@create')->name('threads.create');
Route::post('/threads/create', 'App\Http\Controllers\ThreadController@create');

require __DIR__.'/auth.php';
