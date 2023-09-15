<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
});
Route::get('/SignUp',[userController::class,'register'] );
Route::get('/LogIn',[userController::class,'LogIn'] );
Route::get('/CreatePost',[PostController::class,'create']);
Route::get('/AddComment',[CommentController::class,'addComment']);
Route::get('/Delete',[UserController::class,'delete']);
Route::get('/read',[PostController::class,'read']);
Route::get('/post_delete',[PostController::class,'delete']);
Route::get('/comment_delete',[CommentController::class,'RemoveComment']);
Route::get('/admin_read',[userController::class,'admin_read']);
