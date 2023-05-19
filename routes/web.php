<?php

use App\Models\Post;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function() {
    $countCategories = Categories::count();
    $countPosts = Post::count();

    return view('home', compact('countCategories', 'countPosts'));
})->middleware('auth');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');

Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index', 'admin.categories'])->name('admin.categories.index');
Route::get('/admin/categories/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create', 'admin.categories.create']);
Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store', 'admin.categories.store']);
Route::get('/admin/categories/{id}/edit', [App\Http\Controllers\Admin\CategoriesController::class, 'edit', 'admin.categories.edit'])->name('admin.categories.edit');
Route::put('/admin/categories/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update', 'admin.categories.update'])->name('admin.categories.update');
Route::delete('/admin/categories/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete', 'admin.categories.delete'])->name('admin.categories.delete');

Route::get('/admin/posts', [App\Http\Controllers\Admin\PostController::class, 'index', 'admin.posts'])->name('admin.posts.index');
Route::get('/admin/posts/create', [App\Http\Controllers\Admin\PostController::class, 'create', 'admin.posts.create']);
Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostController::class, 'store', 'admin.posts.store']);
Route::get('/admin/posts/{id}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit', 'admin.posts.edit'])->name('admin.posts.edit');
Route::put('/admin/posts/update', [App\Http\Controllers\Admin\PostController::class, 'update', 'admin.posts.update'])->name('admin.posts.update');
Route::delete('/admin/posts/delete', [App\Http\Controllers\Admin\PostController::class, 'delete', 'admin.posts.delete'])->name('admin.posts.delete');

Auth::routes();
