<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaEditRequest;
use App\Http\Requests\CategoriaRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::orderBy('id', 'ASC')->paginate(10);
        return view('categories.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $categoria = Category::orderBy('id', 'desc')->first();
        $numimg= $categoria->id +1;
        $category = new Category();
        $category->nombre = $request->get('nombre');
        $category->descripcion = $request->get('descripcion');
        if ($request->hasFile('img')){
            $file = $request->file('img');
            $path = storage_path().'/app/public/img';
            $fileName = $numimg.'-categoria.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $category->img = '/storage/img/'.$fileName;
        }
        $category->save();
        return redirect('/categoria');
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
        $categoria = Category::find($id);
        return view('categories.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaEditRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->nombre = $request->get('nombre');
        $category->descripcion = $request->get('descripcion');
        if ($request->hasFile('img')){
            $file = $request->file('img');
            $path = storage_path().'/app/public/img';
            $fileName = $category->id.'-categoria.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $category->img = '/storage/img/'.$fileName;
        }
        $category->save();
        return redirect('/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
