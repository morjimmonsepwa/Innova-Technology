<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Permisos extends Controller
{
    
    public static function get($array = false){

        $permisos['dashboard'] = true;

        $permisos['usuarios.index'] = true;
        $permisos['usuarios.create'] = true;
        $permisos['usuarios.destroy'] = true;
        $permisos['usuarios.edit'] = true;

        $permisos['role.index'] = true;
        $permisos['role.create'] = true;
        $permisos['role.destroy'] = true;
        $permisos['role.edit'] = true;

        $permisos['quejas.index'] = true;
        $permisos['quejas.create'] = true;
        $permisos['quejas.destroy'] = true;
        $permisos['quejas.edit'] = true;

        $permisos['reportes.index'] = true;
        $permisos['reportes.create'] = true;
        $permisos['reportes.destroy'] = true;
        $permisos['reportes.edit'] = true;

        $permisos['informes.index'] = true;
        $permisos['informes.create'] = true;
        $permisos['informes.destroy'] = true;
        $permisos['informes.edit'] = true;

        
        if ( $array ) {
            $return = $permisos;
        }else{
            $return = json_encode($permisos);
        }

        return $return;
    }

}
