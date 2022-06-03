<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Permisos;
use Illuminate\Support\Fascades\Validator;
use App\Models\Role;


class Roles extends Controller
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


        $param['permisos'] = Permisos::get(true);
     
        $param['roles'] = Role::all();


        return view('admin.pages.users.roles.index',$param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $new = new Role();

        $new->name = $request->input('name');

        $valores_permisos = $request->input('permisos');

        if($request->input('permisos')!=''){
            
            foreach($valores_permisos as $key=>$value){
                $permisos [$value] = true;
            }

            $new->permisos = json_encode($permisos);
        }else{
            $new->permisos=null;
        }

        $new->save();

        return redirect()->route('index.role');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        $rol->permisos = json_decode($rol->permisos,true);


        $param['permisos'] = Permisos::get(true);
        $param['rol']=$rol;

        return view('admin.pages.users.roles.edit',$param);
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
        $rol = Role::find($id);

        $valores_permisos = $request->input('permisos');

        if($request->input('permisos')!=''){

            foreach($valores_permisos as $key => $item) {

                $permisos [$item] = true;
                    
            }
                $rol->permisos = json_encode($permisos);

        }else{

            $rol->permisos = null;
        }

        $rol->name = $request->input('name');
        
        $rol->save();
        
        return redirect()->route('index.role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rol = Role::destroy('id', $id);


        return redirect()->route('index.role');

    }
}
