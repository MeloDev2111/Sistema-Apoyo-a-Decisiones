@extends('navbar')
@section('titulo',' Meta SAC')
@section('contenido')
<style>
  #main{
    padding:50px 100px;
  }
  #cont-permiso{
    display: flex;
    gap:10px;
  }
</style>
    <div style="display: none;" id="permiso">{{$rol}}</div> 
    <div class="card">
      <div class="card-header">
        Permisos
      </div>
      <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text">cuenta con los siguientes permisos</p>
        <div id = "cont-permiso"></div>
      </div>
    </div>
     
     

     <script>
       const contenedor = document.getElementById("cont-permiso")
       const permisos = JSON.parse(document.querySelector("#permiso").innerHTML)
       permisos.forEach(x=>{
         div = document.createElement("div")
         div.innerHTML = x[0].name
         div.setAttribute("class","btn btn-primary")
         contenedor.appendChild(div)
         //console.log(x[0].name)
         })
     </script>
@endsection
@extends('footer')
