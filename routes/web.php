<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;
use App\Http\Controllers\Roles;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    /* Rutas Administrador */
        
        Route::get('/dashboard',[Web::class,'dashboard'])->name('dashboard')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']);
    
    /***********************/


    /* Rutas Administrador Users*/
        
        Route::get('/admin/users',[Roles::class,'index'])->name('index.users');

    
    /***********************/


    /* Rutas Web */
    
        Route::get('/',[Web::class,'index'])->name('index');
    
    /***********************/

