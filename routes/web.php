<?php

use App\Http\Controllers\AuthCOntroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCOntroller;
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
});
Route::get('/register', [AuthCOntroller::class, 'register'])->name("register");
Route::get("/login", [AuthCOntroller::class, 'login'])->name('login');

// Route::get('/AddComment', [CommentController::class, 'addComment']);

Route::middleware(['auth'])->group(function () {
          Route::get("/logout", [AuthCOntroller::class, 'logout'])->name('logout');


     
            Route::get('/create_post', [PostController::class, 'create']);
            Route::get('/delete_post', [PostController::class, 'delete']);
            Route::get('/read_post', [PostController::class, 'read']);


            Route::get('/create_comment', [CommentController::class, 'create']);
            Route::get('/delete_comment', [CommentController::class, 'delete']);
            Route::get('/read_comment', [CommentController::class, 'read']);

            
    
            Route::get('/read_user', [AuthCOntroller::class, 'read']);
            Route::get('/delete_user',[AuthCOntroller::class, 'delete']);

           }
);