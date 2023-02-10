<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function index(){
        $products= Product::get();
        return view('index', compact('products'));
    }

    public function categories(){
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code){

        $category = Category::where('code', $code)->first();

        return view('category', compact('category') );

    }

    public function product($category, $product){
        $category = Category::where('code',$category)->first();
        $product = Product::where('name',$product)->first();
        return view('product',compact('product', 'category'));
    }

}
