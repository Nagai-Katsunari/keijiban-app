<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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

Route::get('/threads/create', [ThreadController::class, 'create'])->name('threads.create');
Route::post('/threads/create', [ThreadController::class, 'create']);
Route::post('/threads/create', [ThreadController::class, 'store']);

Route::get('/threads/{thread}',  [ThreadController::class, 'show'])->name('threads.show');

Route::post('/threads/{thread}/comments', [CommentController::class, 'store'])->name('comments.store');

require __DIR__.'/auth.php';
