<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria;
use App\Http\Requests\StoreArticulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::orderBy('id','desc')->paginate(5);
        $categorias = Categoria::orderBy('nombre')->pluck('nombre','id');
        $cate = Categoria::all();
        return view('articulos.index',[
            'articulos' => $articulos,
            'categorias' => $categorias,
            'cate' => $cate
        ]);
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
    public function store(StoreArticulo $request)
    {
        $a = new Articulo;
        $a->nombre = $request->nombre;
        $a->categoria_id = $request->categoria_id;
        $a->estado = true;
        $a->save();
        return back()->with('success','Articulo creado exitosamente');
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
        $a = Articulo::findOrFail($id);
        $a->nombre = $request->nombre;
        $a->categoria_id = $request->categoria_id;
        $a->estado = true;
        $a->save();
        return back()->with('success','Articulo editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivar($id)
    {
        $a = Articulo::findOrFail($id);
        $a->estado = false;
        $a->save();
        return back()->with('success','Articulo desactivado exitosamente');
    }

    public function activar($id)
    {
        $a = Articulo::findOrFail($id);
        $a->estado = true;
        $a->save();
        return back()->with('success','Articulo activado exitosamente');
    }
}
