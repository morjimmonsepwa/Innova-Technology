<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;

use App\Models\User;

class Web extends Controller
{

    public function index(){

        return view('Bienvenido');

    }


    public function dashboard(){

        $user = User::all();
        $ticket1 = Ticket::all()->where('status', 1); 
        $ticket2 = Ticket::all()->where('status', 2);
        $ticket3 = Ticket::all()->where('status', 3);

        $param['abiertos'] = $ticket1; 
        $param['proceso'] = $ticket2; 
        $param['cerrado'] = $ticket3; 
        $param['registrado'] = $user; 

        return view('admin.pages.home.index', $param);

        // return view('dashboard');
        
    }

}
