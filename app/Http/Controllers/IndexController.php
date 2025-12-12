<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $city = City::all();
        $category = Category::all();

        //Жадная загрузка, загрузка в модель places данных из других таблиц
        $places = Place::with(['city','category'])->get();

        //Получаем все категории и добавляем к каждой свойство places_count
        $categoryFilter = Category::withCount('places')->get();

        $portfolios = Portfolio::all();

        $articles = Article::all();
        return view('index.index',compact([
            'city',
            'category',
            'places',
            'categoryFilter',
            'portfolios',
            'articles'
        ]));
    }
}
