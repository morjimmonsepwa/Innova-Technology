<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Detail_group;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

class Users extends Controller
{   
        /**
     * Control de Acceso
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        $rol = Role::all();

        $param['users'] = $user;
        $param['roles'] = $rol;

        return view('admin.pages.users.users.index',$param);

    }

    public function store(){

        Alert::toast('Agregado Correctamente','success');

        return redirect()->route('index.users');

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        Alert::toast('Actualizado Correctamente','success');
        return redirect()->route('index.users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $verifica = empty(Detail_group::where('id_user',$id)->get()[0]['id_user']);

        if($verifica){
            $rol = User::destroy('id', $id);
            Alert::toast('Eliminado Correctamente','success');
            return redirect()->route('index.users');
        }else{
            Alert::toast('Usuario Asignado a Grupo','error');
            return redirect()->route('index.users');
        }

        

    }
}
