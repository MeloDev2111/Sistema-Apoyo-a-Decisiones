@extends('navbar')
@section('titulo',' Meta SAC')
@section('contenido')
    <h1>Permisos del Usuario {{$user->name}}</h1>
      {{$rol}}
@endsection
@extends('footer')
