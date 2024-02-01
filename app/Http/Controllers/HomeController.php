<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['categories'] = Category::where('is_delete', 0)->get();

        return view('index', $data);
    }

    public function category($category ){
        $data['categories'] = Category::where('is_delete', 0)->get();

        return view('index', $data);
    }

    public function subCategory($category, $subcategory)
    {
        $data['categories'] = Category::where('is_delete', 0)->get();
        // $data['selectedCategory'] = Category::where('slug', $category)->firstOrFail();
        // $data['selectedSubCategory'] = SubCategory::where('slug', $subCategory)->firstOrFail();

        return view('index', $data);
    }
}
