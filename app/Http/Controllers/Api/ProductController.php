<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id = $request->get('category_id');
        $product->nombre = $request->get('nombre');
        $product->descripcion = $request->get('descripcion');
        $product->sale = $request->get('sale');
        $product->user_id = $request->get('user_id');
        $product->precio = $request->get('precio');
        $product->available = $request->get('available');
        $product->category_id =  $request->get('category_id');
        $product->save();
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->category_id = $request->get('category_id');
        $product->nombre = $request->get('nombre');
        $product->descripcion = $request->get('descripcion');
        $product->sale = $request->get('sale');
        $product->user_id = $request->get('user_id');
        $product->precio = $request->get('precio');
        $product->available = $request->get('available');
        $product->category_id =  $request->get('category_id');
        $product->save();
        return  response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json($product, 204);
    }
}
