<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/posts', [PostController::class,'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class,'show'])->name('posts.show');
Route::get('/contactez-nous', [PostController::class,'contact'])->name('contact');
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
