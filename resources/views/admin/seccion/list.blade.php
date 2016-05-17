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
Administracion de Secciones
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
              Nueva Seccion
			</a>
          <br>
          <br>
          <h3 class="box-title">Lista de Secciones</h3>
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
				      <th>Nombre</th>
				      <th>Estado</th>
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
			        <td>{{$lista->nombre}}</td>
			        <td>{{$lista->activo}}</td>

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
			      <th>Nombre</th>
				  <th>Estado</th>
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
@stop
@section('javascript')
<script>
	$('#myModalCreateSong').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})

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