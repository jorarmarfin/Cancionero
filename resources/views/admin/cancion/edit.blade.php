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
	{!!Form::model($song,['route'=> ['admin.cancion.update',$song],'method'=> 'PUT','class'=>''])!!}
		@include('alerts.errors')
		@include('alerts.success')
		@include('alerts.warning')
	<!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <br>
          <h3 class="box-title">Editar Cancion</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        	 <div class='row'>
	        	<div class="col-sm-6">
					{!!Form::label('lblSeccion', 'Seccion :')!!}
					{!!Form::select('ddlSeccion',['-1'=>'Selecionar']+$Secciones ,$codsec,['class'=>'form-control','id'=>'ddlSeccion'])!!}</br>
				</div>
				<div class="col-sm-6">
					<div id="idtema">{{$song->idcategoria}}</div>
					{!!Form::label('lblTema', 'Tema :')!!}
					{!!Form::select('idcategoria',['-1'=>'Selecionar'] ,null,['class'=>'form-control','id'=>'ddlTema'])!!}</br>
				</div>
	        </div>
	        <div class='row'>
	        	<div class="col-sm-12">
					{!!Form::label('lblTitulo', 'Ingresar Titulo de la cancion: ')!!}
					{!!Form::text('titulo',null, ['class'=>'form-control','placeholder'=>'Ingresar Titulo'])!!}</br>
				</div>
	        </div>
	        <div class='row'>
				<div class="col-sm-12">
					{!!Form::label('lblCuerpo', 'Ingresar Letra :')!!}
					<div class="box-body pad">
					{!!Form::textarea('cuerpo',null, ['class'=>'form-control','placeholder'=>'Ingresar cuerpo de la cancion','rows'=>'50', 'cols'=>'50','id'=>'editor1'])!!}</br>
					</div>
				</div>
			</div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        	<a href="{{route('admin.cancion.index')}}" class="btn btn btn-success">
              Cancelar
			</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	{!!Form::close()!!}
@stop

@section('librerias')
<!-- FastClick -->
<script src={{asset("plugins/fastclick/fastclick.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("dist/js/demo.js")}}></script>
<!-- WYSWIYG HTML editor  -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Codigo para Dropdowlist dependientes -->
<script src={{asset("js/codigo.js")}}></script>
@stop

@section('javascript')
<script>
	// Funcion para editor de texto
	  $(function () {
	    // Replace the <textarea id="editor1"> with a CKEditor
	    // instance, using default configuration.
	    CKEDITOR.replace('editor1');
	  });
</script>
@stop
