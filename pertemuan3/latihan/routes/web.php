<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');
Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth')->name('categories.index');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Posts Routes
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware(['auth','verified'])->name('dashboard.posts.index');
Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create'])->middleware(['auth','verified'])->name('dashboard.posts.create');
Route::post('/dashboard/posts/store', [DashboardPostController::class, 'store'])->middleware(['auth','verified'])->name('dashboard.posts.store');
Route::get('/dashboard/posts/show/{post:slug}', [DashboardPostController::class, 'show'])->middleware(['auth','verified'])->name('dashboard.posts.show');

Route::get('/dashboard/posts/edit/{post:slug}', [DashboardPostController::class, 'edit'])->middleware(['auth','verified'])->name('dashboard.posts.edit');
Route::post('/dashboard/posts/update', [DashboardPostController::class, 'update'])->middleware(['auth','verified'])->name('dashboard.posts.update');

Route::delete('/dashboard/posts/destroy/{id}', [DashboardPostController::class, 'destroy'])->middleware(['auth','verified'])->name('dashboard.posts.destroy');

// Dashboard Categories Routes
Route::get('/dashboard/categories', [App\Http\Controllers\DashboardCategoryController::class, 'index'])->middleware(['auth','verified'])->name('dashboard.categories.index');
Route::get('/dashboard/categories/create', [App\Http\Controllers\DashboardCategoryController::class, 'create'])->middleware(['auth','verified'])->name('dashboard.categories.create');
Route::post('/dashboard/categories/store', [App\Http\Controllers\DashboardCategoryController::class, 'store'])->middleware(['auth','verified'])->name('dashboard.categories.store');

Route::get('/dashboard/categories/edit/{category:id}', [App\Http\Controllers\DashboardCategoryController::class, 'edit'])->middleware(['auth','verified'])->name('dashboard.categories.edit');
Route::post('/dashboard/categories/update', [App\Http\Controllers\DashboardCategoryController::class, 'update'])->middleware(['auth','verified'])->name('dashboard.categories.update');

Route::delete('/dashboard/categories/destroy/{id}', [App\Http\Controllers\DashboardCategoryController::class, 'destroy'])->middleware(['auth','verified'])->name('dashboard.categories.destroy');