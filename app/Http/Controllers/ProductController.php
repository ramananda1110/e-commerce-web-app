<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');

    }

    public function store(Request $request)
    {
       $this->validate($request,[
            'name'=>'required',
            'description'=>'required|min:3',
            'image'=>'required|mimes:jpeg,png',
            'price'=>'required|numeric',
            'additional_info'=>'required',
            'category'=>'required',
       ]);

    }



}
