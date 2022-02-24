<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\compraProducto;
use App\Mail\denunciaProducto;
use App\Models\Etiqueta;
use App\Models\Imagen;
use App\Models\Product;
use App\Models\User;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        if (isset($_GET['search'])){
            $products = Product::where('nombre', 'like', $_GET['search'].'%');
            return response()->json($products->paginate(24), 200);
        }

        if (isset($_GET['detalles'])){
            $products = Product::where('id', $_GET['detalles'])->get();
            $user = User::where('id', $products[0]->user_id)->get();
            $valoracionUser = Valoracion::where('user_id', $user[0]->id)->get();
            $valoracion = $valoracionUser->average('valoracion');
            $conteo = $valoracionUser->count();
            return response()->json(compact('products','user', 'valoracion','conteo'), 200);
        }

        if (isset($_GET['limite'])){
            $limit = $_GET['limite']??100000;
            $products = Product::where('sale',0)->limit($limit)->get();
            return response()->json($products, 200);
        }

        if (isset($_GET['userId'])){
            $products = Product::where('user_id', $_GET['userId'])->get();
            return response()->json($products, 200);
        }

        if (isset($_GET['compradorId'])){
            $products = Product::where('comprador_id', $_GET['compradorId'])->get();
            return response()->json($products, 200);
        }

        $products = Product::where('sale',0);
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
        if (isset($_GET['countCategory'])){
            $products = $products->where('category_id', $_GET['countCategory'])->count();
            return response()->json($products, 200);
        }
        if (isset($_GET['countEtiqueta'])){
            $etiqueta = DB::table('etiqueta_product')->where('etiqueta_id', $_GET['countEtiqueta'])->count();
            return response()->json($etiqueta, 200);
        }
        if (isset($_GET['countPrecio'])){
            if ($_GET['countPrecio'] == 1000){
                $priceInicial = (float)$_GET['countPrecio']-1000;
                $priceFinal = (float) $_GET['countPrecio'];
            }else{
                $priceInicial = (float)$_GET['countPrecio']-100;
                $priceFinal = (float) $_GET['countPrecio'];
            }
            $products = $products->whereBetween('precio', [$priceInicial, $priceFinal])->count();
            return response()->json($products, 200);
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
        $product->category_id = $request->get('categoria');
        $product->nombre = $request->get('name');
        $product->descripcion = $request->get('descripcion');
        $product->sale = 0;
        $product->user_id = $request->get('userId');
        $product->precio = $request->get('price');
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
    public function update(Request $request)
    {

        $postArray = $request->all();
        $product = Product::find($postArray['id']);
        $product->sale = 1;
        $product->comprador_id = $postArray['comprador_id'];
        $product->save();
        $user = User::find($product->user_id);
        $correo = new compraProducto($product);
        Mail::to($user->email)->send($correo);
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
