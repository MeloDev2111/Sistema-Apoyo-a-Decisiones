@extends('navbar')
@section('titulo')
    Meta SAC
@endsection
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
      <form action="{{ url('/incidencias/'.$incidente['id']) }}" method="POST">
          @csrf
          {{method_field('PATCH')}}

          <input type="hidden" name="idUsuario" value="{{$usuario->id}}">
          
          <div class="form-group h2 row">
            <label class="col-md-3" for="titulo">Titulo</label>
            <div class="col-md-6">
                <input class="h4" name="title" type="text" class="form-control" id="titulo" placeholder="Incidents Title"
                  value="{{$incidente->titulo}}">
            </div>
          </div>

          <div class="form-group h2 row">
              <label class="col-md-3" for="Descripcion">{{ 'Descr.' }} </label>
              <textarea class="col-md-6 h5" name="descripcion" id="Descripcion" autocomplete="description"
              placeholder="Ingresa una descripcion del incidente" maxlength="250" 
              rows="4">{{$incidente["descripcion"]}}</textarea>
          </div>

          <input type="hidden" name="estado" value="{{$incidente->estado}}">

          <div class="form-group">
              <input class="btn btn-info btn-lg" type="submit" value="Editar Incidente"/><br>
          </div>

      </form>
  </div>
@endsection
