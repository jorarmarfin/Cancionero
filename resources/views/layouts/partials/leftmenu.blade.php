<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form (Optional) -->
      {!!Form::open(['route'=>'admin.cancion.search','method'=>'POST','class'=>'sidebar-form'])!!}
        <div class="input-group">
          {!!Form::text('titulo',null, ['class'=>'form-control','placeholder'=>'Buscar cancion'])!!}
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      {!!Form::close()!!}
      <!-- </form> -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li><a href={{route('admin')}}><i class="fa fa-dashboard fa-fw"></i> <span>Panel</span></a></li>
        <li><a href="{{route('admin.cancion.index')}}"><i class="fa fa-font"></i> <span>Alfabetico</span></a></li>
        <li><a href="{{route('admin.seccion.index')}}"><i class="ion ion-stats-bars"></i> <span>Secciones</span></a></li>
        <li><a href="{{--route('venta.list')--}}"><i class="fa fa-text-width"></i> <span>Temas</span></a></li>
        <li><a href="{{--route('producto.list')--}}"><i class="fa fa-th"></i> <span>Seleccion</span></a></li>

      </ul>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
