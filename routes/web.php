<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth','isAdmin'])->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
});

Route::prefix('user')->middleware(['auth'])->name('user.')->group(function () {
    Route::resource('posts', UserPostController::class);
});

Route::prefix('user')->middleware('auth')->name('user.')->group(function() {
    Route::get('/list', [UserUserController::class, 'index'])->name('list');
    Route::get('/{user}', [UserUserController::class, 'show'])->name('show');
    Route::post('/comment', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'delete'])->name('comments.delete');
});


require __DIR__.'/auth.php';
