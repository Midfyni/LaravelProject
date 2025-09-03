<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home', ['title']);
    }

    public function about(){
        return view('home.about', ['owner' => 'midfai']);
    }

    public function dashboard(){
        // $category = Article::filter()->latest()->paginate(5);
        $categories = Category::all();
        // $article = Article::all();
        return view('home.dashboard', ['categories' => $categories]);
    }
}
