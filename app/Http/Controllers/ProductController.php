<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {   
       
        return view('productsingle')
        ->with(['product' => $product ,
                'rating' => $product->reviews->avg('stars'),
                'formats' => $product->formats->all(),
                'review' => $product->reviews->all()
        ]);
    }




    
}
