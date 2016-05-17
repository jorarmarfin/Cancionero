<?php

namespace App\Http\Controllers;

use App\Cancion;
use App\Catalogo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.index');
    }

    public function alfabetico()
    {
        $Lista = Cancion::getSongs('titulo');
        return view('web.alfabetico',compact('Lista'));
    }

    public function songtheme($id)
    {
        $Lista = Cancion::getSongTheme($id);
        return view('web.alfabetico',compact('Lista'));
    }

    public function secciones()
    {
        $Lista = Catalogo::getSecciones();
        return view('web.secciones',compact('Lista'));
    }

    public function mostrar($id)
    {
        $song = Cancion::findOrFail($id);
        return view('web.mostrarcancion',compact('song'));
    }

    public function secciontema($id)
    {
        $codsec = Catalogo::findOrFail($id);
        $Lista = Catalogo::getTemas($codsec->codigo)->get();
        return view('web.temas',compact('Lista'));
    }

    public function temas()
    {
        $Lista = Catalogo::getTemas();
        return view('web.temas',compact('Lista'));
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
}
