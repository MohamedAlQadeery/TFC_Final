<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Food;

class HomeController extends Controller
{
    public function index()
    {
        $categories_count = Category::count();
        $food_count = Food::count();
        $attr_count = Attribute::count();

        return view('dashboard.index', compact('categories_count', 'food_count', 'attr_count'));
    }
}
