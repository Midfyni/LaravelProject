<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $article = Article::filter()->latest()->paginate(5);
        return view('articles.posts', ['artikel' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $slug = Str::slug(fake()->sentence());

        $request->merge(['penulis_id' => $userId]);
        $request->merge(['slug' => $slug]);

        $validated = $request->validate([
            'judul' => 'required',
            'penulis_id' => 'required',
            'category_id' => 'required',
            'slug' => 'required',
            'isi' => 'required',
        ]);

        Article::create($validated);
        return redirect()->route('dashboard')->with('success', 'Article created.');
    }

    public function post(Article $article)
    {
        return view('articles.post', ['article' => $article]);
    }

    public function category(Category $category)
    {
        $articles = $category->categoryArticles()->latest()->paginate(5);
        return view('articles.posts', ['artikel' => $articles]);
    }
}
