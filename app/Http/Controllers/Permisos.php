<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Permisos extends Controller
{
    
    public static function get($array = false){

        $permisos['dashboard'] = true;

        $permisos['usuarios.index'] = true;
        $permisos['usuarios.store'] = true;
        $permisos['usuarios.destroy'] = true;
        $permisos['usuarios.update'] = true;

        $permisos['role.index'] = true;
        $permisos['role.store'] = true;
        $permisos['role.destroy'] = true;
        $permisos['role.update'] = true;

        $permisos['grupos.index'] = true;
        $permisos['grupos.store'] = true;
        $permisos['grupos.destroy'] = true;
        $permisos['grupos.update'] = true;

        $permisos['quejas.index'] = true;
        $permisos['quejas.store'] = true;
        $permisos['quejas.destroy'] = true;
        $permisos['quejas.update'] = true;

        $permisos['reportes.index'] = true;
        $permisos['reportes.store'] = true;
        $permisos['reportes.destroy'] = true;
        $permisos['reportes.update'] = true;

        $permisos['empresas.index'] = true;
        $permisos['empresas.store'] = true;
        $permisos['empresas.destroy'] = true;
        $permisos['empresas.update'] = true;

        
        if ( $array ) {
            $return = $permisos;
        }else{
            $return = json_encode($permisos);
        }

        return $return;
    }

}
