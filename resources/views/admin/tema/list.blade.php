@extends('layouts.admin')

@section('links')
<!-- DataTables -->
  <link rel="stylesheet" href={{asset("plugins/datatables/dataTables.bootstrap.css")}}>
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
@include('alerts.success')
	<!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        	<a href="#" class="btn btn btn-warning" data-toggle="modal" data-target="#myModalCreateSong">
              <i class="fa fa fa-plus" ></i>
              Nueva Cancion
			</a>
          <br>
          <br>
          <h3 class="box-title">Lista de Canciones</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
	        <table id="tabla1" class="table table-bordered table-hover ">
			    <thead>
				    <tr>
				      <th>Nro</th>
				      <th>Titulos</th>
				      <th>Seccion</th>
				      <th>Tema</th>
				      <th>Opciones</th>
				    </tr>
			    </thead>
			    <tbody>
			    @foreach($Lista as $lista)
			    	@if($lista->estado=='Pagado')
			      		<tr class="info">
			      	@else
			      		<tr>
			    	@endif
			        <td>{{$lista->id}}</td>
			        <td>{{$lista->titulo}}</td>
			        <td>{{$lista->seccion}}</td>
			        <td>{{$lista->tema}}</td>

			        <td>
			            <a href="{{route('admin.cancion.edit',$lista->id)}}" class="btn btn-primary" >
			              <i class="fa fa-pencil" ></i>
			            </a>
			            <a href="{{route('admin.cancion.show',$lista->id)}}" class="btn btn-danger">
			              <i class="fa fa-trash-o" ></i>
			            </a>
			            <a href="{{route('admin.cancion.ver',$lista->id)}}" class="btn btn-success">
			              <i class="fa fa-eye" ></i>
			            </a>
			        </td>
			      </tr>

			    @endforeach
			    </tbody>
			    <tfoot>
			    <tr>
			      <th>Nro</th>
			      <th>Titulos</th>
			      <th>Seccion</th>
			      <th>Tema</th>
			      <th>Opciones</th>
			    </tr>
			    </tfoot>
			</table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

<!-- Modal -->
{!!Form::open(['route'=> 'admin.cancion.store','method'=> 'POST','class'=>''])!!}
<div class="modal fade" id="myModalCreateSong" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Cancion</h4>
      </div>
      <div class="modal-body">

        <div class='row'>
        	<div class="col-sm-6">
				{!!Form::label('lblSeccion', 'Seccion :')!!}
				{!!Form::select('ddlSeccion',['-1'=>'Selecionar']+$Secciones ,null,['class'=>'form-control','id'=>'ddlSeccion'])!!}</br>
			</div>
			<div class="col-sm-6">
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
					{!!Form::label('lblCuerpo', 'Ingresar cuerpo :')!!}
					<div class="box-body pad">
					{!!Form::textarea('cuerpo',null, ['class'=>'form-control','placeholder'=>'Ingresar cuerpo de la cancion','rows'=>'50', 'cols'=>'50','id'=>'editor1'])!!}</br>
					</div>
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
{!!Form::close()!!}
@stop

@section('librerias')
<!-- FastClick -->
<script src={{asset("plugins/fastclick/fastclick.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("dist/js/demo.js")}}></script>
<!-- DataTables -->
<script src={{asset("plugins/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("plugins/datatables/dataTables.bootstrap.min.js")}}></script>
<!-- WYSWIYG HTML editor  -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Codigo para Dropdowlist dependientes -->
<script src={{asset("js/codigo.js")}}></script>
@stop
@section('javascript')
<script>
	$('#myModalCreateSong').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
	// Funcion para editor de texto
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });

  $(function () {
    $('#tabla1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


@stop