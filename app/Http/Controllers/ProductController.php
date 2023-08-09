<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::all();
        return response()->json([
            'message' => 'All Products',
                'data' => $product,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
             'category_id' => 'required',
             'price' => 'required',
             'description'=>'required',
             'stock_quantity'=>'required',

        ]);


        $product = product::create($request->all());

        return response()->json([
            'message' => 'Saved Successfully',
                'data' => $product,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return response()->json([
            'message' => 'Success',
                'data' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
             'category_id' => 'required',
             'price' => 'required',
             'description'=>'required',
             'stock_quantity'=>'required',

        ]);


        $product = $product->update($request->all());
       

        return response()->json([
            'message' => 'Updated Successfully',
                'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Deleted Successfully',
        ]);
    }
}
