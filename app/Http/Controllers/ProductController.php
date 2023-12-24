<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products(){
        $products = Product::all();
        return view('products',['data'=>$products]);
    }

    public function addProduct()
    {
        return view('add');
    }
    
    public function alterProduct($id)
    {
        $product = Product::where('id',$id)->first();
        return view('update',['data'=>$product]);
    }
}
