@extends('navbar')
@section('titulo')
    Meta SAC
@endsection

@section('contenido')
  <div class = "container p-2">
    @if (Session::has('Mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('Mensaje') }}
        </div>
    @endif
    <div class = "row">
        <div class ="col-md-8">
            <h2>LISTADO DE INCIDENCIAS</h2>
        </div>
        <div class ="col-md-3">
            <a class="btn btn-success btn-md" href="{{url('/incidencias/crear')}}">Crear Incidencia</a>
        </div>
    </div>
    <div class="mt-3">
        <table class = "table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>id</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Usuario</th>
                    <th>FechaCreacion</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($incidencias as $item)
                    <tr>
                        <td>{{$item -> id}}</td>
                        <td>{{$item -> titulo}}</td>
                        <td>{{$item -> descripcion}}</td>
                        <td>{{$item -> usuario}}</td>
                        <td>{{$item -> created_at}}</td>
                        <td>{{$item -> estado}}</td>

                        <td>
                        @switch($item -> estado)
                          @case("Pendiente")
                            @can('root')
                              <!-- Opciones de Admin -->
                              <a class="btn btn-success btn-sm" href='/incidencias/aceptar/{{$item -> id}}'>Aceptar</a>
                              <a class="btn btn-danger btn-sm" href='/incidencias/rechazar/{{$item -> id}}'>Rechazar</a>
                            @else
                              <!-- Opciones de Usuario-->
                              <a class="btn btn-info btn-sm" href="{{url('/incidencias/'.$item->id.'/editar')}}">Editar</a>
                              <form action="{{url('/incidencias/'.$item->id)}}" method="post">
                                  @csrf
                                  {{method_field('DELETE')}}

                                  <input type="submit" onclick="return confirm('Desea borrar incidencia {{$item->id}}?');" class="btn btn-danger btn-sm" value="Borrar"/>
                              </form>
                            @endcan

                            @break
                          @case("Aceptado")
                            @can('root')
                              <a class="btn btn-warning btn-sm" href='/incidencias/cerrar/{{$item -> id}}'>Cerrar</a>
                            @endcan
                            @break
                          @default
                        @endswitch
                      </td>
                    </tr>
                @empty
                    NO HAY INCIDENCIAS REGISTRADAS
                @endforelse
              </tbody>
          </table>
          {{$incidencias->links()}}
      </div>
  </div>
@endsection

@extends('footer')
