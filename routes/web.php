<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,'home']);

Route::get('post/{id}', [PostController::class,'postshow']);

Route::get('posts',[PostController::class,'index']);

Route::get('posts/create',[PostController::class,'create']);

Route::get('posts/search',[PostController::class,'search']);

Route::post('posts',[PostController::class,'store']);

Route::get('posts/{id}/edit',[PostController::class,'edit']);

Route::put('posts/{id}',[PostController::class,'update']);

Route::delete('posts/{id}',[PostController::class,'destroy']);