<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $new = new User();
        $new->name = $request->input('name');
        $new->email = $request->input('email');
        $new->password = bcrypt($request->input('password'));
        $new->id_rol = $request->input('rol');
        $new->save();

        Alert::toast('Guardado Correctamente','success');

        return redirect()->route('index.users');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {           

        $user = User::findOrFail($id);
        $rol = Role::all();
  
        $param['roles'] = $rol;
        $param['user']=$user;

        
        return view('admin.pages.users.users.edit',$param);
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

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->id_rol = $request->input('rol');
        $user->save();

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
        
        $rol = User::destroy('id', $id);

        Alert::toast('Eliminado Correctamente','success');

        return redirect()->route('index.users');

    }
}
