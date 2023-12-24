<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductAPIController extends Controller
{
    public function index(){
       $response = Product::get();

       return response(['data'=>$response,'message'=>'Product List Fetched Successfully!']);
    }

    public function store(Request $request){

        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');

        if($request->hasFile('product_image')) {
            foreach($request->product_image as $image){
                $file = $image;
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $name = $timestamp. '-' .$file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
                $nameArray[] = $name;
            }
            $product->product_image = implode(',',$nameArray);
        }else{
            $product->product_image = "";
        }
        $product->save();

        return redirect()->back();
    }

    public function edit($id){
        $response = Product::where('id',$id)->get();
        return response(['data'=>$response,'message'=>'Product View Fetched Successfully!']);
    }

    public function update(Request $request){

        if($request->hasFile('product_image')) {
            foreach($request->product_image as $image){
                $file = $image;
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $name = $timestamp. '-' .$file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
                $nameArray[] = $name;
            }
            $updateProd = implode(',',$nameArray);
            
            $response =  Product::where('id',$request->id)
                    ->update([
                        'product_name'  => $request->product_name,
                        'product_price' => $request->product_price,
                        'product_description' => $request->product_description,
                        'product_image' => $updateProd
                    ]);
        }else{
            $response =  Product::where('id',$request->id)
                    ->update([
                        'product_name'  => $request->product_name,
                        'product_price' => $request->product_price,
                        'product_description' => $request->product_description
                    ]);
        }

        return redirect()->back();
    }

    public function delete($id){
        $response =   Product::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Product Deleted Successfully!');
    }
}
