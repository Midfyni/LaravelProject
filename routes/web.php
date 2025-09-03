<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\penulisController;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home', ['title']);
// });

// Route::get('/about', function () {
//     return view('about', ['owner' => 'midfai']);
// });

// Route::get('/posts', function () {
//     $article = Article::filter()->latest()->paginate(5);
//     return view('posts', ['artikel' => $article]);
// });

// Route::get('/posts/{article:slug}', function (Article $article) {
//     // $artikel = Article::find($article);

//     return view('post', ['article' => $article]);
// });

// Route::get('/penulis/{user:username}', function (User $user) {
//     // $articles = $user->userArticles->load('category', 'penulis');
//     $articles =$user->userArticles()->latest()->paginate(5);
//     return view('posts', ['artikel' => $articles]);
// });

// Route::get('/category/{category:slug}', function (Category $category) {
//     // $articles = $category->categoryArticles->load('category', 'penulis');
//     $articles = $category->categoryArticles()->latest()->paginate(5);
//     return view('posts', ['artikel' => $articles]);
// });

// Route::get('/contact', function () {
//     return view('contact', ['link' => 'https://youtube.com']);
// });

// Route::resource('articles', ArticleController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/about', [HomeController::class, 'about']);
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::resource('articles', ArticleController::class);
    Route::get('/articles/post/{article:slug}', [ArticleController::class, 'post']);
    Route::get('/articles/category/{category:slug}', [ArticleController::class, 'category']);

    Route::resource('penulis', PenulisController::class);
    Route::get('/penulis/articles/{user:username}', [PenulisController::class, 'articles']);
});

// dd('login');

// Route::get('/articles/post/{article:slug}', [ArticleController::class, 'post']);
// Route::get('/articles/category/{category:slug}', [ArticleController::class, 'category']);

// Route::resource('penulis', PenulisController::class);

// Route::get('/penulis/articles/{user:username}', [PenulisController::class, 'articles']);