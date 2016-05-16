<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table = 'cancion';
    protected $fillable = ['idcategoria', 'titulo', 'cuerpo','activo'];
    protected $hidden = ['remember_token'];


    public function scopegetSongs($cadenaSQL,$orden){
		return $cadenaSQL->select(
								'cancion.id',
								'cancion.titulo',
								'catalogo.nombre as tema')
                        ->join('catalogo','catalogo.id','=','cancion.idcategoria')
                        ->orderBy($orden)->get();
	}

}
