<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['userId'])){
            $mensajes = DB::table('mensajes')->where('receptor_id',$_GET['userId'])->get();
            return response()->json($mensajes, 200);
        }

        if (isset($_GET['productId'])){
            $mensajes = DB::table('mensajes')->where('product_id',$_GET['productId'])->get();
            return response()->json($mensajes, 200);
        }else {
            $mensajes = Mensaje::all();
            return response()->json($mensajes, 200);
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
        $mensaje = new Mensaje();
        $mensaje->emisor_id = $request->get('emisor_id');
        $mensaje->receptor_id = $request->get('receptor_id');
        $mensaje->product_id = $request->get('product_id');
        $mensaje->contenido = $request->get('contenido');
        $mensaje->save();
        return response()->json($mensaje, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        return response()->json($mensaje,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        $mensaje->emisor_id = $request->get('emisor_id');
        $mensaje->receptor_id = $request->get('receptor_id');
        $mensaje->product_id = $request->get('product_id');
        $mensaje->contenido = $request->get('contenido');
        $mensaje->created_at = $request->get('created_at');
        $mensaje->save();
        return  response()->json($mensaje, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();
        return response()->json($mensaje, 204);
    }
}
