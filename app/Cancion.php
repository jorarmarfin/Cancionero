<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table = 'cancion';
    protected $fillable = ['idcategoria', 'titulo', 'cuerpo','activo'];
    protected $hidden = ['remember_token'];
}
