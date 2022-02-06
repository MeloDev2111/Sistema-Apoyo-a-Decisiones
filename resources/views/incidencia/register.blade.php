@extends('navbar')
@section('titulo')
    Meta SAC
@endsection
<!-- No olvidar modificar el navbar en la parte del logo con assert-->
@section('contenido')
  @if (count($errors)>0)
  <div class="alert alert-danger" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul>
  </div>
  @endif

  <div class = "card card-body">
      <form action="{{ url('/incidencias') }}" method="POST">
          @csrf

          <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}">
          
          <div class="form-group h2 row">
            <label class="col-md-3" for="titulo">Titulo</label>
            <div class="col-md-6">
                <input class="h4" name="title" type="text" class="form-control" id="titulo" placeholder="Incidents Title">
            </div>
          </div>

          <div class="form-group h2 row">
              <label class="col-md-3" for="Descripcion">{{ 'Descr.' }} </label>
              <textarea class="col-md-6 h5" name="descripcion" id="Descripcion" autocomplete="description"
              placeholder="Ingresa una descripcion del incidente" maxlength="250" 
              rows="4"></textarea>
          </div>

          <input type="hidden" name="estado" value="Pendiente">

          <div class="form-group">
              <input class="btn btn-success btn-lg" type="submit" value="Crear Incidente"/><br>
          </div>

      </form>
  </div>
@endsection
