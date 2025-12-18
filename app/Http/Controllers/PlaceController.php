<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    //
    public function index(Request $request)
    {
        $city = City::all();
        $category = Category::all();

        $query =
        $places = Place::with(['city','category'])->get();
        return view('place.index',compact('places','city','category'));
    }

    public function show(string $categorySlug, string $placeSlug)
    {
        $cat = Category::where('slug',$categorySlug)->firstOrFail();
        $place = Place::where('slug', $placeSlug)->where('category_id',$cat->id)->with(['city','category'])->firstOrFail();
        $portfolio = Portfolio::where('place_id', $place->id)->get();

        return view('place.show',compact('place','portfolio'));
    }

}
