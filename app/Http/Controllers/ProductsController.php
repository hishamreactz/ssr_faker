<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Processor;
use App\Measurement;
class ProductsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

  
    public function index()
    {
      
        $products['products'] = Product::paginate(9);
        $products['brands'] = Brand::all();
        $products['processors'] = Processor::all();
        $products['screen_sizes'] = Measurement::all();

        return view('products')->with('products', $products);
    }



    public function filter_products(Request $request){

        $products = Product::with('brand');

        if(is_array ($request->range)){

            $range = $request->range;

        }else{

        $range = isset($request->range)?explode(',', "$request->range"):null;

        }

        $brand = isset($request->brand)?$request->brand:null;

        $processor = isset($request->processor)?$request->processor:null;

        $screensize = isset($request->screensize)?$request->screensize:null;

        $touch = isset($request->touch)?$request->touch:null;

        $availability = isset($request->availability)?$request->availability:null;

        //  dd([$range,$brand,$processor,$screensize,$touch,$availability ]);

       

        $brand!=null ? $products->whereIn('brand_id',$brand):'';

        $processor!=null ? $products->whereIn('processor_type',$processor):'';
        
        $screensize!=null ? $products->whereIn('screen_size',$screensize):'';

        $touch!=null ? $products->where('touch_screen',1):'';

        $availability!=null ? $products->where('availability',0):'';

        $range!=null ? $products->whereBetween('price', [$range[0], $range[1]]):'';

       
        
        $response['products'] =  $products->paginate(9);
        

        $response['brands'] = Brand::all();
        $response['processors'] = Processor::all();
        $response['screen_sizes'] = Measurement::all();

        $response['requests'] = ['range'=>$range,'brand'=>$brand,'processor'=>$processor,'screensize'=>$screensize,'touch'=>$touch,'availability'=>$availability ];

        // dd($response);



        return view('products')->with('products', $response);

    }
}
