<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cancion extends Model
{
    protected $table = 'cancion';
    protected $fillable = ['idcategoria', 'titulo', 'cuerpo','activo'];
    protected $hidden = ['remember_token'];

    /**
     * Lista las canciones registradas
     * @param  strgin $cadenaSQL consulta
     * @param  string $orden     el orden que se desea la lista de canciones
     * @return string            [description]
     */
    public function scopegetSongs($cadenaSQL,$orden){
		return $cadenaSQL->select(
								'cancion.id',
								'cancion.titulo',
								't.nombre as tema',
								's.nombre as seccion'
								)
                        ->join('catalogo as t','t.id','=','cancion.idcategoria')
                        ->join('catalogo as s','s.codigo','=',DB::raw("concat(substring(t.codigo,1,2),'00')"))
                        ->get();
	}
    /**
     * Busca canciones por titulo
     * @param  string $cadenaSQL consulta
     * @param  string $song      titulo
     * @return data            object
     */
    public function scopesearchSongs($cadenaSQL,$song){
        return $cadenaSQL->select(
                                'cancion.id',
                                'cancion.titulo',
                                't.nombre as tema',
                                's.nombre as seccion'
                                )
                        ->join('catalogo as t','t.id','=','cancion.idcategoria')
                        ->join('catalogo as s','s.codigo','=',DB::raw("concat(substring(t.codigo,1,2),'00')"))
                        ->where('titulo','like',"%$song%")
                        ->get();
    }

    public function scopegetSongTheme($cadenaSQL,$idTema)
    {
        return $cadenaSQL->select(
                                'cancion.id',
                                'cancion.titulo',
                                't.nombre as tema',
                                's.nombre as seccion'
                                )
                        ->join('catalogo as t','t.id','=','cancion.idcategoria')
                        ->join('catalogo as s','s.codigo','=',DB::raw("concat(substring(t.codigo,1,2),'00')"))
                        ->where('t.id',$idTema)
                        ->get();
    }

}
