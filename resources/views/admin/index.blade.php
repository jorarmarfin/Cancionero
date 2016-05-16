@extends('layouts.admin')

@section('links')
<!-- Links css -->

@stop

@section('titulo')
Cancionero | Tuya es mi alabanza
@stop

@section('nombreusuario')
{!!Auth::user()->name!!}
@stop

@section('titulopagina')
Bienvenido
@stop

@section('subtitulopagina')
Al sistema de administración
@stop

@section('cuerpo')
	@include('alerts.errors')
	@include('alerts.success')
	@include('alerts.warning')
<div class="row">
		<!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$TotalCancion}}</h3>
              <p>Alfabetico</p>
            </div>
            <div class="icon">
              <i class="fa fa-font"></i>
            </div>
            <a href="{{route('admin.cancion.index')}}" class="small-box-footer">Mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$TotalSecciones}}</h3>

              <p>Secciones</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$TotalTemas}}</h3>

              <p>Temas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Seleccion</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
@stop

@section('librerias')
<!-- Archivos js -->

@stop

@section('javascript')
<!-- Codigo java script colocar etiquetas -->
@stop