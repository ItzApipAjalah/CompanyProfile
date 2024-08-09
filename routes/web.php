<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\TestEmailController;
use App\Http\Controllers\ContactController;

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
Route::get('/test-email', [TestEmailController::class, 'sendTestEmail']);
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::get('/category/{name}', [ProductController::class, 'showCategoryProducts'])->name('category.products');

Route::get('/semua-blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/semua-produk', [App\Http\Controllers\HomeController::class, 'produks'])->name('produk');

// login
Route::middleware('redirect_if_authenticated:admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('blog-posts/{title}', [BlogPostController::class, 'show'])->name('blog-posts.show');
// admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [Controller::class, 'dashboard_admin'])->name('admin.dashboard');

    Route::get('/admin/produks', [ProductController::class, 'index'])->name('produks.index');
    Route::get('/admin/produks/create', [ProductController::class, 'create'])->name('produks.create');
    Route::post('/admin/produks', [ProductController::class, 'store'])->name('produks.store');
    Route::get('/admin/produks/{produk}', [ProductController::class, 'show'])->name('produks.show');
    Route::get('/admin/produks/{produk}/edit', [ProductController::class, 'edit'])->name('produks.edit');
    Route::put('/admin/produks/{produk}', [ProductController::class, 'update'])->name('produks.update');
    Route::delete('/admin/produks/{produk}', [ProductController::class, 'destroy'])->name('produks.destroy');

    Route::get('/admin/teams', [TeamMemberController::class, 'index'])->name('teams.index');
    Route::get('/admin/teams/create', [TeamMemberController::class, 'create'])->name('teams.create');
    Route::post('/admin/teams', [TeamMemberController::class, 'store'])->name('teams.store');
    Route::get('/admin/teams/{team}', [TeamMemberController::class, 'show'])->name('teams.show');
    Route::get('/admin/teams/{team}/edit', [TeamMemberController::class, 'edit'])->name('teams.edit');
    Route::put('/admin/teams/{team}', [TeamMemberController::class, 'update'])->name('teams.update');
    Route::delete('/admin/teams/{team}', [TeamMemberController::class, 'destroy'])->name('teams.destroy');

    route::get('/admin/profiles', [ProfileController::class, 'index'])->name('profiles.index');
    Route::get('/admin/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/admin/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/admin/blog-posts', [BlogPostController::class, 'index'])->name('blog-posts.index');
    Route::get('/admin/blog-posts/create', [BlogPostController::class, 'create'])->name('blog-posts.create');
    Route::post('/admin/blog-posts', [BlogPostController::class, 'store'])->name('blog-posts.store');


    Route::get('/admin/blog-posts/{id}/edit', [BlogPostController::class, 'edit'])->name('blog-posts.edit');
    Route::put('/admin/blog-posts/{id}', [BlogPostController::class, 'update'])->name('blog-posts.update');
    Route::delete('/admin/blog-posts/{id}', [BlogPostController::class, 'destroy'])->name('blog-posts.destroy');

});
