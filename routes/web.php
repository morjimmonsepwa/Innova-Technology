<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;
use App\Http\Controllers\Roles;
use App\Http\Controllers\Users;
use App\Http\Controllers\Reportes;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\QuejasController;
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

    /* Rutas Web */
    
    Route::get('/',[Web::class,'index'])->name('index');
    
    /***********************/

    /* Rutas Administrador */
        
        Route::get('/dashboard',[Web::class,'dashboard'])->name('dashboard')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->middleware('permisos:dashboard');
    
    /***********************/


    /* Rutas Administrador Users*/
        
        Route::get('/admin/users',[Users::class,'index'])->name('index.users');
       

    /***********************/


     /* Rutas Administrador Roles*/
        
        Route::get('/admin/role',[Roles::class,'index'])->name('index.role');
        Route::get('/admin/role/create',[Roles::class,'create'])->name('create.role');
        Route::post('/admin/role',[Roles::class,'store'])->name('store.role');
        Route::get('/admin/role/{id}',[Roles::class,'show'])->name('show.role');
        Route::get('/admin/role/{id}/edit',[Roles::class,'edit'])->name('edit.role');
        Route::patch('/admin/role/{id}',[Roles::class,'update'])->name('update.role');
        Route::put('/admin/role/{id}',[Roles::class,'destroy'])->name('destroy.role');


    /***********************/

    /* Rutas Administrador Reportes*/
    
        Route::get('/admin/reportes',[Reportes::class,'indexrepor'])->name('index.reportes');
        Route::get('/admin/informes',[Reportes::class,'indexinfor'])->name('index.informes');

    /***********************/
    

    /* Rutas Administrador Grupos*/
        
        Route::get('/admin/grupos',[GruposController::class,'index'])->name('index.grupos');

    /***********************/

    /* Rutas Administrador Quejas*/
        
        Route::get('/admin/quejas',[QuejasController::class,'index'])->name('index.quejas');

    /***********************/

