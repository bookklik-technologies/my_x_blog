<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
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

Route::get('/', [BlogController::class, 'home'])->name('blog.home');
Route::post('/posts/search', [BlogController::class, 'search'])->name('blog.posts.search');
Route::get('/post/{slug?}', [BlogController::class, 'post'])->name('blog.post');
Route::get('/posts', [BlogController::class, 'posts'])->name('blog.posts');
Route::get('/category/{slug?}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/categories', [BlogController::class, 'categories'])->name('blog.categories');
Route::get('/keyword/{key?}', [BlogController::class, 'keyword'])->name('blog.keyword');
Route::post('/comments/submit', [BlogController::class, 'commentSubmit'])->name('blog.comments.submit');
Route::get('/about', [BlogController::class, 'about'])->name('blog.about');
Route::get('/page/{slug?}', [BlogController::class, 'page'])->name('blog.page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
