<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DenunciaA;
use Illuminate\Http\Request;

class DenunciesAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncias = DenunciaA::where('user_id',$_GET['userId'])->where('product_id',[$_GET['productId']])->get();
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
        $denuncia = new DenunciaA();
        $denuncia->user_id = $request->get('user_id');
        $denuncia->product_id = $request->get('product_id');
        $denuncia->save();
        return response()->json($denuncia, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DenunciaA  $denunciaA
     * @return \Illuminate\Http\Response
     */
    public function show(DenunciaA $denunciaA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DenunciaA  $denunciaA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DenunciaA $denunciaA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DenunciaA  $denunciaA
     * @return \Illuminate\Http\Response
     */
    public function destroy(DenunciaA $denunciaA)
    {
        //
    }
}
