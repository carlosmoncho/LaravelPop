<?php

namespace App\Http\Controllers;

use App\Mail\denunciaMensaje;
use App\Models\DenunciaM;
use App\Models\Mensaje;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DenunciasMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncias = DenunciaM::orderBy('id', 'ASC')->paginate(5);
        return view('denuncias.indexM', compact('denuncias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $tipo)
    {
        $denuncia = DenunciaM::find($id);
        if ($tipo == 'aceptada'){
            $mensaje = Mensaje::find($denuncia->mensaje_id);
            $user = User::find($mensaje->emisor_id);
            $correo = new denunciaMensaje($mensaje);
            Mail::to($user->email)->send($correo);
            Mensaje::find($denuncia->mensaje_id)->delete();
        }
        $denuncia->delete();
        return back();
    }
}
