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
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
