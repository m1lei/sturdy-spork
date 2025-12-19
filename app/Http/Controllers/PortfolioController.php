<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = Portfolio::with(['place.category', 'attachment'])
            ->whereHas('place');

        if($request->filled('category')){
            $query->wherehas('place', function ($q) use ($request){
                $q->where('category_id', $request->category);
            });
        }

        $portfolio = $query->get();

        $category = Category::all();

        return view('portfolio.index',compact('portfolio', 'category'));
    }

    public function show(string $categorySlug)
    {
        $portfolio = Portfolio::where('slug', $categorySlug)->get();
        return view('portfolio.show',compact('portfolio'));
    }
}
