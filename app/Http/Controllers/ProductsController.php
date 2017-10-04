<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

  
    public function index()
    {
      
    	$products = Product::with('brand')->paginate(9);
        return view('products')->with('products', $products);
    }

    public function filter_products(Request $request){

        dd($request);

        $products = Product::with('brand')->paginate(9);
        return view('products')->with('products', $products);

    }
}
