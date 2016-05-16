<?php

namespace App\Http\Controllers\Cancion;

use App\Cancion;
use App\Catalogo;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Cancion::getSongs('titulo');
        $Secciones = Catalogo::getSecciones()->lists('nombre', 'codigo')->toarray();
        // dd($Secciones->toArray());
        return view('admin.cancion.list',compact('Lista','Secciones'));
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
        $data = $request->all();
        $song = new Cancion($data);
        $song->save();
        return redirect()->route('admin.cancion.index')->with('success','Se ha registrado satisfactoriamente');
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
        $song = Cancion::findOrFail($id);
        $Secciones = Catalogo::getSecciones()->lists('nombre', 'codigo')->toarray();

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
    public function destroy($id)
    {
        //
    }

    public function gettema($id)
    {
        $tema = Catalogo::getTemas($id)->get();
        return $tema;
    }
}
