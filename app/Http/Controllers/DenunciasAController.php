<?php

namespace App\Http\Controllers;

use App\Mail\denunciaProducto;
use App\Models\DenunciaA;
use App\Models\DenunciaM;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DenunciasAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncias = DenunciaA::orderBy('id', 'ASC')->paginate(5);
        return view('denuncias.indexA', compact('denuncias'));
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
        $product = Product::find($id);

        return view('denuncias.showA', compact('product'));
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
        $denuncia = DenunciaA::find($id);
        if ($tipo == 'aceptada'){
            $product = Product::find($denuncia->product_id);
            $user = User::find($product->user_id);
            $correo = new denunciaProducto($product);
            Mail::to($user->email)->send($correo);
            Product::find($denuncia->product_id)->delete();
        }
        $denuncia->delete();
        return back();
    }
}
