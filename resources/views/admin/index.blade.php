@extends('layouts.admin')

@section('links')
<!-- Links css -->

@stop

@section('titulo')
este es mi titulo de head
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

@stop

@section('librerias')
<!-- Archivos js -->

@stop

@section('javascript')
<!-- Codigo java script colocar etiquetas -->
@stop