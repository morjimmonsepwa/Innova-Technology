<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_group;
use App\Models\Role;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class Evaluacion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_user)
    {

        $detalle = Detail_group::propios(Auth::user()->id);

        $user= User::all();
        $rol = Role::all();

        $abierto = Ticket::status_abierto($id_user);
        $proceso = Ticket::status_proceso($id_user);
        $cerrado = Ticket::status_cerrado($id_user);

        $abierto = json_decode($abierto,true);
        $proceso = json_decode($proceso,true);
        $cerrado = json_decode($cerrado,true);

        $grafica = array_merge($abierto,$proceso,$cerrado);

        foreach($grafica as $key=>$value){
            foreach($value as $item){
                $array[]=$item;
            }
        }
       
      
        $param['data'] = json_encode($array);
        $param['detalle'] = $detalle;
        $param['users'] = $user;
        $param['roles'] = $rol;
        $param['id_user'] = $id_user;


        return view('admin.pages.evaluacion.index',$param);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
