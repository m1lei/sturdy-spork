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

        $query = Place::with(['city', 'category','attachment']);

        if ($request->filled('city_slug')) {
            $query->whereHas('city', function ($q) use ($request) {
                $q->where('slug', $request->city_slug);
            });
        }

        if ($request->filled('category_slug')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category_slug);
            });
        }

        $places = $query->latest()->get();

        return view('place.index', compact('places', 'city', 'category'));
    }


    public function show(string $categorySlug, string $placeSlug)
    {
        $cat = Category::where('slug',$categorySlug)->firstOrFail();
        $place = Place::where('slug', $placeSlug)->where('category_id',$cat->id)->with(['city','category'])->firstOrFail();
        $portfolio = Portfolio::where('place_id', $place->id)->get();

        return view('place.show',compact('place','portfolio'));
    }

}
