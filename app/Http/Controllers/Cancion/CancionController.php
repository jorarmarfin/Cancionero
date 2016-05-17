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
        $song = Cancion::findOrFail($id);
        $Secciones = Catalogo::getSecciones()->lists('nombre', 'codigo')->toarray();
        $Sections = Catalogo::findOrFail($song->idcategoria);
        $codsec = substr($Sections->codigo,0 ,2).'00';
        return view('admin.cancion.delete',compact('Secciones','song','codsec'));
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
        $Sections = Catalogo::findOrFail($song->idcategoria);
        $codsec = substr($Sections->codigo,0 ,2).'00';
        return view('admin.cancion.edit',compact('Secciones','song','codsec'));

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
        $song = Cancion::findOrFail($id);
        $song->fill($request->all());
        $song->save();
        return redirect()->route('admin.cancion.index')->with('success','Se ha editado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cancion::destroy($id);
        return redirect()->route('admin.cancion.index')->with('success','Se ha eliminado la cancion');
    }
    /**
     * Devuelve los temas respecto a un aseccion escogida
     * @param  String $id codigo de seccion
     * @return data     los temas
     */
    public function gettema($id)
    {
        $tema = Catalogo::getTemas($id)->get();
        return $tema;
    }
    /**
     * Muestra la cancion escogida
     * @param  integer $id identificador de la cancion
     * @return object     objeto cancion
     */
    public function verCancion($id)
    {
        $song = Cancion::findOrFail($id);
        $Tema = Catalogo::findOrFail($song->idcategoria);
        $codsec = substr($Tema->codigo,0 ,2).'00';
        $Seccion = Catalogo::where('codigo',$codsec)->get();
        $Tema = $Tema->nombre;
        $Seccion = $Seccion[0]['nombre'];
        // dd($Seccion[0]['nombre']);
        return view('admin.cancion.show',compact('song','Tema','Seccion'));

    }
    /**
     * Busca canciones por titulo
     * @param  Request $request titulo enviado
     * @return [type]           [description]
     */
    public function searchSong(Request $request)
    {
        $data = $request->all();
        $Lista = Cancion::searchSongs($data['titulo']);
        $Secciones = Catalogo::getSecciones()->lists('nombre', 'codigo')->toarray();
        return view('admin.cancion.list',compact('Lista','Secciones'));
    }
}
