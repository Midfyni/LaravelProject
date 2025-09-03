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
     * Show the form for creating a new resource.
     */
    public function create(Request $request):Article
    {
        $userId = Auth::id();
        //
        dd($userId);
        // return Article::create([
        //     'judul' => $request['title'],
        //     'penulis_id' => fake()->unique()->username(),
        //     'category_id' => $request['email'],
        //     'slug' => '',
        //     'isi' => '',
        // ]);
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


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
