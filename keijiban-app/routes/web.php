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



Route::get('/threads/create', [ThreadController::class, 'create'])->name('threads.create');
Route::post('/threads/create', [ThreadController::class, 'create']);
Route::post('/threads/create', [ThreadController::class, 'store']);

Route::get('/threads/{thread}',  [ThreadController::class, 'show'])->name('threads.show');

Route::post('/threads/{thread}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::delete('/admin/{thread}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/comments/{comment}/edit', [CommentController::class, 'edit']);

Route::post('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');

Route::get('/threads', [CommentController::class, 'index'])->name('threads');

Route::get('/admin', [AdminController::class, 'index']);






require __DIR__.'/auth.php';
