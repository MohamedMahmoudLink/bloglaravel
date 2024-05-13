<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Comments;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('posts.create');
});


// comments



// end comment

Route::post('/comments', [Comments::class,"store"])->name('comments.store')->middleware("auth");


Route::resource('posts', PostController::class);



Auth::routes();

Route::resource('Category', CategoryController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/user/{id}', [UserController::class,'show'])->name("user");


Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');








// soft delete 
Route::get('/Archive', [PostController::class, 'viewdata'])->name('Archive');
Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');

Route::delete('/posts/{id}/delete-permanently', [PostController::class, 'ForceDelete'])
    ->name('PostForceDelete');


    Route::get('/Archive/category', [CategoryController::class, 'viewdata'])->name('Archivecate');
Route::get('/Category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');

Route::delete('/Category/{id}/delete-permanently', [CategoryController::class, 'ForceDelete'])
    ->name('ForceDelete');