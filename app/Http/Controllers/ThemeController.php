<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class ThemeController extends Controller
{
    public function index ()
    {
        $categories = Category::all();

        return view('main',['categories'=>$categories]);
    }
}
