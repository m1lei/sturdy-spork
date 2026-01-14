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
        return view('portfolio.index');
    }

    public function show(string $categorySlug)
    {
        $portfolio = Portfolio::where('slug', $categorySlug)->get();
        return view('portfolio.show',compact('portfolio'));
    }
}
