@extends('navbar')
@section('titulo')
    Meta SAC
@endsection

@section('contenido')
  <div class="text-center bg-Light p-5 rounded">
    <img src="/images/logo_Meta.png" alt="" class="img img-fluid">
    <h1 class="mt-4 pt-4">Bienvenidos a Meta CORP</h1>
    <p class="lead">
      Sistema de Apoyo a Decisiones para mejorar el área de ventas de la Empresa Adventure Works Cycles
    </p>
    <br><br>
    <a class="btn btn-lg btn-primary" onclick="loadBI();" role="button">
      Continuar &raquo;</a>
  </div>
@endsection

@extends('footer')
