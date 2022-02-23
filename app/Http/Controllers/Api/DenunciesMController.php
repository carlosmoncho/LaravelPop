<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DenunciaM;
use Illuminate\Http\Request;

class DenunciesMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncias = DenunciaM::where('user_id',$_GET['user_id'])->where('mensaje_id',[$_GET['mensaje_id']])->get();
        if (count($denuncias) > 0){
            return response()->json(true, 200);
        }else{
            return response()->json(false, 200);
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
        $denuncia = new DenunciaM();
        $denuncia->user_id = $request->get('user_id');
        $denuncia->mensaje_id = $request->get('mensaje_id');
        $denuncia->save();
        return response()->json($denuncia, 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DenunciaM  $denunciaM
     * @return \Illuminate\Http\Response
     */
    public function show(DenunciaM $denunciaM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DenunciaM  $denunciaM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DenunciaM $denunciaM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DenunciaM  $denunciaM
     * @return \Illuminate\Http\Response
     */
    public function destroy(DenunciaM $denunciaM)
    {
        //
    }
}
