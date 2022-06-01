<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class permisos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$section)
    {
        $rol = Auth::user()->rol->permisos;
        


        $permisos = json_decode($rol,true);

        if ( isset($permisos[$section]) ) {

            if ( $permisos[$section] ) {
                return $next($request);
            }

        }

        abort(403);
    }
}
