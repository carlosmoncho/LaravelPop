<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::get();
        foreach ($etiquetas as $etiqueta){
            $conteo[] = DB::table('etiqueta_product')->where('etiqueta_id', $etiqueta->id)->count();
        }
        return response()->json(compact('etiquetas','conteo'), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etiqueta = new Etiqueta();
        $etiqueta->id = $request->get('id');
        $etiqueta->nombre = $request->get('nombre');
        $etiqueta->save();
        return response()->json($etiqueta, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $etiqueta)
    {
        return response()->json($etiqueta, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        $etiqueta->nombre = $request->get('nombre');
        $etiqueta->save();
        return response()->json($etiqueta, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();
        return response()->json($etiqueta, 204);
    }
}
