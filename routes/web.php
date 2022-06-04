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

// Route::get('/', function () {

//     $images = Image::all();
//     foreach ($images as $image) {
//         echo $image->image_path . '</br>';
//         echo $image->description . '</br>';
//         echo $image->user->name . ' ' . $image->user->surname . '</br>';

//         if (count($image->comments) >= 1) {
//             echo '<h3>Comentarios</h3>';
//             foreach ($image->comments as $comment) {
//                 echo $comment->user->username . ' ha comentado: ' . $comment->content . '</br>';
//             }
//         }
//         echo 'Likes: '. count($image->like);
//         // var_dump($image->like);
//         echo '<hr>';
//     }
//     die();
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/config', [App\Http\Controllers\userController::class, 'config'])->name('config');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\userController::class, 'getImage'])->name('getImage');
Route::post('/user/update', [App\Http\Controllers\userController::class, 'update'])->name('update');
Route::get('/image/upload', [App\Http\Controllers\ImageController::class, 'create'])->name('upload');
Route::post('/image/save', [App\Http\Controllers\ImageController::class, 'save'])->name('save');
Route::get('/image/file/{filename}', [App\Http\Controllers\ImageController::class, 'getImage'])->name('image.file');
Route::get('/image/detail/{id}', [App\Http\Controllers\ImageController::class, 'detail'])->name('image.detail');
Route::post('/comment', [App\Http\Controllers\commentController::class, 'store'])->name('comment');

