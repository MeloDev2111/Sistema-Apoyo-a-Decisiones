<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class PermisoController extends Controller
{
    public function index(){
        $user = User::all();
        $roles = Role::all();
        return view('permisos',compact('user','roles'));
    }

    public function savePermiso(Request $request){

            $user = User::find($request->usuario);
            $user->assignRole($request->rol);
            return redirect('permisos');


    }

    public function show($id){
        $user = User::find($id);
        $s = DB::table('model_has_roles')->where('model_id',$user->id)->get(['role_id']);
        $rol = [];
        for($i = 0; $i < count($s); ++$i){
            $rol[$i] = DB::table('roles')->where('id',$s[$i]->role_id)->get(['name']);
        }
        $rol = json_encode($rol);
        return view('showPermisos', compact('user','rol'));
    }

}
