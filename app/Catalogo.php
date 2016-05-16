<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Catalogo extends Model
{
    protected $table = 'catalogo';
    protected $fillable = ['idtable', 'iditem', 'codigo','nombre','descripcion','valor','activo'];
    protected $hidden = ['remember_token'];
    // public $timestamps = false;
    #####################################################################
	public function Maestro($NameTable){
		$data=$this->select('iditem')
				   ->where('idtable',0)
			       ->where('nombre',"$NameTable")->first();
		return $data->iditem;
	}
	#--------------------------------------------------------------------
	public function scopeCombo($cadenaSQL,$NameTable){
		$idtable=$this->Maestro($NameTable);
		return $cadenaSQL->where('idtable',$idtable)
						 ->where('activo',1)->orderBy('id');
	}
	#--------------------------------------------------------------------
	public function scopeIdCatalogo($cadenaSQL,$NameTable,$NameSubTable){
		$idtable=$this->Maestro($NameTable);
		return $cadenaSQL->where('idtable',$idtable)
						 ->where('nombre',$NameSubTable)
						 ->where('activo',1)->lists('id')[0];
	}
	#--------------------------------------------------------------------
	public function scopegetSecciones($cadenaSQL){
		$idtable=$this->Maestro('SECCIONES');
		return $cadenaSQL->where('idtable',$idtable)
						 ->where(DB::raw('substring(codigo,3,2)'),'00')
						 ->where('activo',1)
						 ->get();
	}
	#--------------------------------------------------------------------
	public function scopegetTemas($cadenaSQL,$id){
		$idtable=$this->Maestro('SECCIONES');
		$raw1 = DB::raw("SUBSTRING(codigo,1,2)");
		$raw2 = DB::raw("SUBSTRING(codigo,3,2)");
		$id=substr($id,0,2);
		return $cadenaSQL->select('id','nombre')
						 ->where('idtable',$idtable)
						 ->where($raw1,$id)
						 ->where($raw2,'<>','00')
						 ->where('activo',1)
						 ->orderBy('id');
	}

}
