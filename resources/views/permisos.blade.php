@extends('navbar')
@section('titulo',' Meta SAC')
@section('contenido')
<h1>Asignar Permisos A Usuarios</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col">Permisos</th>
        <th scope="col">Asingar Rol</th>
        <th scope="col">Roles asignados</th>
    </tr>
    </thead>
    <tbody>
    @foreach($user as $user)

    <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <form action="{{route('savePermiso')}}" method="POST">
            @csrf
            <input type="hidden" name="usuario" value="{{$user->id}}">
        <td>
            <select  aria-label=".form-select-lg example" name="rol">
                @foreach($roles as $rol)
                <option value="{{$rol->name}}">{{$rol->name}}</option>
                @endforeach
            </select>
        </td>
        <td> <button type="submit"   class="btn btn-success">Asignar</button> </td>
        </form>
        <td><a href="{{route('showPermisos',$user->id)}}" class="btn btn-primary">Ver </a> </td>
    </tr>

    @endforeach
    </tbody>
</table>



@endsection
@extends('footer')
