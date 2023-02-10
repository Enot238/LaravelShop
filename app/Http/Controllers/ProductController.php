<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function search()
    {
       // dd($this->searchterm,$this->q);
//        $genres=Genre::get();
        $query=request('q');
        //dd($query);
        $products= Product::where('name', 'like','%'. $query. '%')->get();
        //$product=$products[0];
//        $author=Author::find($book->author_id);

        return view('searchProduct',['products'=>$products,'q'=>$query]);
    }
}
