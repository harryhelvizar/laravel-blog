<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

// Kategori
Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
Route::post('/category', [CategoriesController::class, 'store'])->name('category.store');
Route::get('/categoryedit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoriesController::class, 'update'])->name('category.update');

//Post
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

//User
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
Route::get('/profil/{id}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');

//Products
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
