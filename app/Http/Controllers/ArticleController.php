<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function show(string $articleSlug)
    {
        $articles = Article::where('slug',$articleSlug)->get();
        return view('article.show',compact('articles'));
    }
}
