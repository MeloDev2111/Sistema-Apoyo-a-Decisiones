<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\User;
use Auth;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['incidencias']=Incidencia::paginate();
        return view('incidencia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('incidencia.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $datosVista=request()->all();

      $timezone = "America/Lima";
      date_default_timezone_set($timezone);
      $DateAndTime = date('Y-m-d H:i:s', time());  
      
      $datosIncidencia=[
        'idUsuario'=>$datosVista['idUsuario'],
        'titulo'=>$datosVista['title'],
        'descripcion'=>$datosVista['descripcion'],
        'estado'=>$datosVista['estado'],
        'created_at'=>$DateAndTime,
      ];  
      
      try {
        Incidencia::insert($datosIncidencia);
        return redirect('incidencias')->with('Mensaje','Agregado con exito');
      } catch (\Throwable $th) {
          return redirect('incidencias')->with('Mensaje','Error al guardar');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function show($id,$estado)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $datos["incidente"] = Incidencia::find($id);
      $datos["usuario"] = User::find($datos["incidente"]["idUsuario"]);
      // problema de seguridad: verificar que el que edite sea el emisor //solved?
      return ($datos["incidente"]["idUsuario"] == Auth::user() -> id 
              && $datos["incidente"]["estado"] == "Pendiente"
            ) ? view("incidencia.edit", $datos) :  redirect('incidencias')->with('Mensaje','Error al Modificar');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $datosVista=request()->all();

      $datosIncidencia=[
        'idUsuario'=>$datosVista['idUsuario'],
        'titulo'=>$datosVista['title'],
        'descripcion'=>$datosVista['descripcion'],
        'estado'=>$datosVista['estado'],
      ];

      try {
        Incidencia::where("id","=",$id)->update($datosIncidencia);
        return redirect('incidencias')->with('Mensaje','Modificado con exito');
      } catch (\Throwable $th) {
        printf($th);
        return redirect('incidencias')->with('Mensaje','Error al Modificar');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $incidencia = Incidencia::where('id','=',$id);
        $incidencia->delete();
        return redirect('incidencias')->with('Mensaje','Expediente eliminado con exito');
      } catch (\Throwable $th) {
        return redirect('incidencias')->with('Mensaje','Error al Eliminar');
      }
    }

    public function aceptar($id){
      try {
        Incidencia::where('id','=',$id)->update(["estado"=>"Aceptado"]);
        return redirect('incidencias')->with('Mensaje','Modificado con exito');
      } catch (\Throwable $th) {
        printf($th);
        return redirect('incidencias')->with('Mensaje','Error al Modificar');
      }
    }

    public function rechazar($id){
      try {
        Incidencia::where('id','=',$id)->update(["estado"=>"Rechazado"]);
        return redirect('incidencias')->with('Mensaje','Modificado con exito');
      } catch (\Throwable $th) {
        printf($th);
        return redirect('incidencias')->with('Mensaje','Error al Modificar');
      }
    }

}
