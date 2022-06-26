<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


}
