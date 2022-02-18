@extends('navbar')
@section('titulo',' Meta SAC')
@section('contenido')
<style>
    .contenedor{
        margin: 50px;
        display: flex;
        justify-content: center;
    }
    .contenedor .bloque{
        width: 80%;
    }
    
</style>
<div class="contenedor">
    <div class="bloque">
    <h1>Visualizar permisos de <span class="badge bg-secondary">Usuarios</span></h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col">Roles asignados</th>
    </tr>
    </thead>
    <tbody>
    @foreach($user as $user)

    <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a href="{{route('showPermisos',$user->id)}}" class="btn btn-primary">Ver </a> </td>
    </tr>

    @endforeach
    </tbody>
</table>
</div>
</div>

@endsection
@extends('footer')
