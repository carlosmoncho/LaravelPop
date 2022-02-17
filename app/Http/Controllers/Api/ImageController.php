<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagen = Imagen::get();
        return response()->json($imagen, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = new Imagen();
        $imagen->product_id = $request->get('product_id');
        $imagen->img = $request->get('img');
        $imagen->save();
        return response()->json($imagen, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        return response()->json($imagen, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        $imagen->product_id = $request->get('product_id');
        $imagen->img = $request->get('img');
        $imagen->save();
        return response()->json($imagen, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {
        $imagen->delete();
        return response()->json($imagen, 204);
    }
}
