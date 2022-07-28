<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory;

    public function empresa(){
        return $this->hasOne(Company::class,'id','id_business');
    }

    public function generado(){
        return $this->hasOne(User::class,'id','id_generate');
    }

    public function responsable(){
        return $this->hasOne(User::class,'id','id_manager');
    }

    public function asignado(){
        return $this->hasOne(User::class,'id','id_assigned');
    }

    public static function excel(){

        
        return DB::table('tickets as t1')
            ->select(
                't1.id',
                DB::raw('
                    CASE WHEN t1.affair = 1 THEN "Queja"
                    WHEN t1.affair = 2 THEN "Devolución"
                    END'
                ),
                't1.reason',
                't1.client',
                DB::raw('
                    CASE WHEN t1.via = 1 THEN "Email"
                    WHEN t1.via = 2 THEN "Llamada"
                    END'
                ),
                't5.name as id_compania',
                't1.product',
                't2.name as generate',
                't3.name as manager',
                't4.name as asignned',
                DB::raw('
                    CASE WHEN t1.status = 1 THEN "Abierto"
                    WHEN t1.status = 2 THEN "Proceso"
                    WHEN t1.status = 3 THEN "Cerrado"
                    END'
                ),
                't1.created_at',
                't1.updated_at'
            )
            ->join('users as t2', 't2.id', '=', 't1.id_generate')
            ->join('users as t3', 't3.id', '=', 't1.id_manager')
            ->leftjoin('users as t4', 't4.id', '=', 't1.id_assigned')
            ->join('companies as t5', 't5.id', '=', 't1.id_business')
            ->where('t1.id_manager',Auth::id())
        ->get();


    }

    public static function status_abierto($id_user){

        return DB::table('tickets as t1')
            ->select(
                DB::raw('count(t1.status) as status'
                )
            )
            ->where('t1.id_assigned',$id_user)
            ->where('t1.status',1)
        ->get();

    }


    public static function status_proceso($id_user){

        return DB::table('tickets as t1')
            ->select(
                DB::raw('count(t1.status) as status'
                )
            )
            ->where('t1.id_assigned',$id_user)
            ->where('t1.status',2)
        ->get();

    }

    public static function status_cerrado($id_user){

        return DB::table('tickets as t1')
            ->select(
                DB::raw('count(t1.status) as status'
                )
            )
            ->where('t1.id_assigned',$id_user)
            ->where('t1.status',3)
        ->get();

    }


}
