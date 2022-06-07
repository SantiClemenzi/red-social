<?php

use Illuminate\Support\Facades\Route;
use App\Models\Image;

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
Auth::routes();

// Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::get('/config', [App\Http\Controllers\userController::class, 'config'])->name('config');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\userController::class, 'getImage'])->name('getImage');
Route::get('/user/profile/{id}', [App\Http\Controllers\userController::class, 'profile'])->name('profile');
Route::get('/user/all/{search?}', [App\Http\Controllers\userController::class, 'index'])->name('user.all');
Route::post('/user/update', [App\Http\Controllers\userController::class, 'upDate'])->name('update');

// Image
Route::get('/image/upload', [App\Http\Controllers\ImageController::class, 'create'])->name('upload');
Route::post('/image/save', [App\Http\Controllers\ImageController::class, 'save'])->name('save');
Route::get('/image/delete/{id}', [App\Http\Controllers\ImageController::class, 'delete'])->name('image.delete');
Route::get('/image/file/{filename}', [App\Http\Controllers\ImageController::class, 'getImage'])->name('image.file');
Route::get('/image/detail/{id}', [App\Http\Controllers\ImageController::class, 'detail'])->name('image.detail');
Route::get('/image/edit/{id}', [App\Http\Controllers\ImageController::class, 'edit'])->name('image.edit');
Route::post('/image/update', [App\Http\Controllers\ImageController::class, 'update'])->name('image.update');

// Comment
Route::post('/comment', [App\Http\Controllers\commentController::class, 'store'])->name('comment');
Route::get('/comment/delete/{id}', [App\Http\Controllers\commentController::class, 'delete'])->name('comment.delete');

// Like
Route::get('/like/{image_id}', [App\Http\Controllers\likeController::class, 'like'])->name('like');
Route::get('/dislike/{image_id}', [App\Http\Controllers\likeController::class, 'dislike'])->name('dislike');
Route::get('/dislike/{image_id}', [App\Http\Controllers\likeController::class, 'dislike'])->name('dislike');
Route::get('/likes', [App\Http\Controllers\likeController::class, 'likes'])->name('likes');
