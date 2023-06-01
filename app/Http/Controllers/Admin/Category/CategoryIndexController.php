<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryIndexController extends Controller
{
    public function IndexCategory()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
}
