<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etiqueta;
use App\Models\Imagen;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if (isset($_GET['limite'])){
            $limit = $_GET['limite']??100000;
            $products = Product::where('sale',0)->limit($limit)->get();
            return response()->json($products, 200);
        }
        $products = Product::where('sale',0)->paginate(24);
        if (isset($_GET['categoria'])){
            $products = $products->where('category_id', $_GET['categoria']);
        }

        if (isset($_GET['precio'])){
            if ($_GET['precio'] == 1000){
                $priceInicial = (float)$_GET['precio']-1000;
                $priceFinal = (float) $_GET['precio'];
            }else{
                $priceInicial = (float)$_GET['precio']-100;
                $priceFinal = (float) $_GET['precio'];
            }
            $products = $products->whereBetween('precio', [$priceInicial, $priceFinal]);
        }
        if (isset($_GET['etiqueta'])){
            $etiqueta = DB::table('etiqueta_product')->where('etiqueta_id', $_GET['etiqueta'])->pluck('product_id');
            $products = $products->whereIn('id', $etiqueta);
        }
        if (isset($_GET['count'])){
            $products = $products->where('category_id', $_GET['count'])->count();
        }
        if ($products->count()){
            return response()->json($products->paginate(24), 200);
        }else{
            return response()->json(null, 200);
        }


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
        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product,200);
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
