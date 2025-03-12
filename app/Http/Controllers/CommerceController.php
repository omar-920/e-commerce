<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    public function viewPage(){
        $products = Product::latest()->get();
        $latest_products = Product::latest()->take(3)->get();
        $categories = Category::all();
        return view('index',compact('products','categories','latest_products'));
    }
    
    public function viewProducts(){
        $products = Product::paginate(9);
        $categories = Category::all();
        return view('products',compact('products','categories',));
    }
    public function viewSingle(Request $request , $id){
        $item = Product::findOrFail($id);
        $latest = Product::latest()->take(4)->get();
        return view('single-product',compact('item','latest'));
        // dd($item);
    }
    
}
