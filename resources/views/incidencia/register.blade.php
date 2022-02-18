@extends('navbar')
@section('titulo')
    Meta SAC
@endsection
<!-- No olvidar modificar el navbar en la parte del logo con assert-->
@section('contenido')

    <style>
        .cont-incidencia{
            margin: 30px;
            display: flex;
            justify-content: center;
        }
        .cont-incidencia form{
            width: 500px;
        }
        a{
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover{
            color:#fff;
        }
        
    </style>
    <div class="cont-incidencia">
  @if (count($errors)>0)
  <div class="alert alert-danger" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul>
  </div>
  @endif


  <form action="{{ url('/incidencias') }}" method="POST">
  @csrf
  <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}">
  <fieldset>
    <legend>Registrar Incidencia</legend>
    <div class="mb-3">
        
      <label for="disabledTextInput" class="form-label">Titulo</label>
      <input type="text" id="disabledTextInput" name="title" class="form-control"  id="titulo"placeholder="establecer titulo de incidencia...">
      
    </div>
    <div class="mb-3">
      <label for="Descripcion" class="form-label">Descripcion</label>
      <textarea rows="10" cols="50" maxlength="250"  id="Descripcion" name="descripcion" class="form-control"  id="titulo" autocomplete="description" placeholder="Ingresa una descripcion del incidente..."></textarea>
    </div>
    
    <input type="hidden" name="estado" value="Pendiente">

    <button type="submit" class="btn btn-primary" >Crear Incidente</button>
  </fieldset>
</form>
</div>
@endsection
