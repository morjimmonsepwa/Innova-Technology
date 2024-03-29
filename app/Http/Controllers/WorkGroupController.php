<?php

namespace App\Http\Controllers;

use App\Models\Work_group;
use App\Models\Detail_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class WorkGroupController extends Controller
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
        $groups = Work_group::all()->where('id_leader',Auth::id());

        $details = Detail_group::all()->take($groups->count()*4);

        $param['groups'] = $groups;
        $param['details'] = $details;
       
        return view('admin.pages.grupos.grupos',$param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Alert::toast('Guardado Correctamente','success');
        return redirect()->route('index.grupos');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work_group  $work_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        Alert::toast('Actualizado Correctamente','success');
        return redirect()->route('index.grupos');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work_group  $work_group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Detail_group::where('id_group',$id)->get()->count() <> 0){
            Alert::toast('Usuarios Asignados','error');
        }else{
            Work_group::destroy('id', $id);
            Alert::toast('Eliminado Correctamente','success');
        }
        
        return redirect()->route('index.grupos');
    }

    
}