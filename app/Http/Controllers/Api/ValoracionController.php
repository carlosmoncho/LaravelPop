<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\valoracionResource;
use App\Http\Resources\valoradorResource;
use App\Models\Product;
use App\Models\Valoracion;
use Illuminate\Http\Request;

class ValoracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['userId'])){
            $valoracion = valoracionResource::collection(Valoracion::where('user_id', $_GET['userId'])->get());
            $count = $valoracion->count();
            return response()->json(compact('valoracion', 'count'), 200);
        }
        if (isset($_GET['valorador'])){
            $valoracion = valoradorResource::collection(Valoracion::where('valorador_id', $_GET['valorador'])->get());
            $count = $valoracion->count();
            return response()->json(compact('valoracion', 'count'), 200);
        }
        else{
            $valoracion = Valoracion::get();
            return response()->json($valoracion, 200);
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
        $product = Product::find($request->get('id'));
        $valoracion = new Valoracion();
        $valoracion->user_id = $product->user_id;
        $valoracion->valorador_id = $request->get('valorador_id');
        $valoracion->product_id = $product->id;
        $valoracion->valoracion = $request->get('valoracion');
        $valoracion->comentario = $request->get('comentario');
        $valoracion->save();
        return response()->json($valoracion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Valoracion  $valoracion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valoraciones = Valoracion::select('valoracion')->where('user_id', $id )->get();
        $average = $valoraciones->avg('valoracion');
        $count = count($valoraciones);
        return response()->json(compact('average','count'),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Valoracion  $valoracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valoracion $valoracion)
    {
        $valoracion->user_id = $request->get('user_id');
        $valoracion->valorador_id = $request->get('valorador_id');
        $valoracion->product_id = $request->get('product_id');
        $valoracion->valoracion = $request->get('valoracion');
        $valoracion->comentario = $request->get('comentario');
        $valoracion->save();
        return response()->json($valoracion, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Valoracion  $valoracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valoracion $valoracion)
    {
        $valoracion->delete();
        return response()->json($valoracion, 204);
    }
}
