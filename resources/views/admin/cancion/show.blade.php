@extends('layouts.admin')

@section('links')

@stop

@section('titulo')
Cancionero | Tuya es mi alabanza
@stop

@section('nombreusuario')
{!!Auth::user()->name!!}
@stop

@section('titulopagina')
Administracion de Canciones
@stop

@section('subtitulopagina')

@stop


@section('cuerpo')
	<!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <br>
          <h3 class="box-title"><strong><u>{{$song->titulo}}</u></strong></h3>
          <p></p>
          <p><strong>Seccion :</strong> {{$Seccion}} | <strong>Tema : </strong>{{$Tema}}</p>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        	{!!$song->cuerpo!!}

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        	<a href="{{route('admin.cancion.index')}}" class="btn btn btn-success">
              Cancelar
			</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
@stop

@section('librerias')
<!-- FastClick -->
<script src={{asset("plugins/fastclick/fastclick.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("dist/js/demo.js")}}></script>
@stop

@section('javascript')

@stop
