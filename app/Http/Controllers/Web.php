<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Web extends Controller
{

    public function index(){

        return view('welcome');

    }


    public function dashboard(){

        return view('admin.pages.home.index');

        // return view('dashboard');
        
    }

}
