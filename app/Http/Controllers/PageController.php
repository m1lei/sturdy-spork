<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        $page = Page::all();
        return view('page.index', compact('page'));
    }
}
