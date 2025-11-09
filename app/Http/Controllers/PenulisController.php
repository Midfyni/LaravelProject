<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function articles(User $user)
    {
        $articles = $user->userArticles()->latest()->paginate(5);
        return view('articles.posts', ['artikel' => $articles]);
    }
}
