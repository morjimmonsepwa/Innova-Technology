<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;
use App\Http\Controllers\Roles;
use App\Http\Controllers\Users;
use App\Http\Controllers\Reportes;
use App\Http\Controllers\WorkGroupController;
use App\Http\Controllers\QuejasController;
use App\Http\Controllers\CompanyController;

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
    
    /*********/

    /* Rutas Administrador */
        
        Route::get('/dashboard',[Web::class,'dashboard'])->name('dashboard')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']);

    /*********/


    /* Rutas Administrador Users*/
        
        Route::get('/admin/users',[Users::class,'index'])->name('index.users')->middleware('permisos:usuarios.index');
        Route::get('/admin/usersstore',[Users::class,'store'])->name('store.users')->middleware('permisos:usuarios.store');
        Route::get('/admin/users/{id}',[Users::class,'update'])->name('update.users')->middleware('permisos:usuarios.update');
        Route::put('/admin/users/{id}',[Users::class,'destroy'])->name('destroy.users')->middleware('permisos:usuarios.destroy');

    /*********/


     /* Rutas Administrador Roles*/
        
        Route::get('/admin/role',[Roles::class,'index'])->name('index.role')->middleware('permisos:role.index');
        Route::get('/admin/rolestore',[Roles::class,'store'])->name('store.role')->middleware('permisos:role.store');
        Route::patch('/admin/role/{id}',[Roles::class,'update'])->name('update.role')->middleware('permisos:role.update');
        Route::put('/admin/role/{id}',[Roles::class,'destroy'])->name('destroy.role')->middleware('permisos:role.destroy');

    /*********/

    /* Rutas Administrador Reportes*/
    
        Route::get('/admin/reportes',[Reportes::class,'index'])->name('index.reportes')->middleware('permisos:reportes.index');
        Route::get('/admin/reportes/pdf/{id}',[Reportes::class,'pdf'])->name('pdf.reportes')->middleware('permisos:reportes.index');
        Route::get('/admin/reportes/excel',[Reportes::class,'excel'])->name('excel.reportes')->middleware('permisos:reportes.index');

    /*********/
    

    /* Rutas Administrador Grupos*/
        
        Route::get('/admin/grupos',[WorkGroupController::class,'index'])->name('index.grupos')->middleware('permisos:grupos.index');
        Route::get('/admin/gruposstore',[WorkGroupController::class,'store'])->name('store.grupos')->middleware('permisos:grupos.store');
        Route::get('/admin/grupos/{id}',[WorkGroupController::class,'update'])->name('update.grupos')->middleware('permisos:grupos.update');
        Route::put('/admin/grupos/{id}',[WorkGroupController::class,'destroy'])->name('destroy.grupos')->middleware('permisos:grupos.destroy');
        

    /*********/

    /* Rutas Administrador Quejas*/
        
        Route::get('/admin/quejas',[QuejasController::class,'index'])->name('index.quejas')->middleware('permisos:quejas.index');
        Route::get('/admin/quejasstora',[QuejasController::class,'store'])->name('store.quejas')->middleware('permisos:quejas.store');
        Route::get('/admin/quejas/{id}',[QuejasController::class,'update'])->name('update.quejas')->middleware('permisos:quejas.update');
        Route::put('/admin/quejas/{id}',[QuejasController::class,'destroy'])->name('destroy.quejas')->middleware('permisos:quejas.destroy');
       

    /*********/


    /* Rutas Administrador Empresas*/
        
        Route::get('/admin/empresas',[CompanyController::class,'index'])->name('index.empresas')->middleware('permisos:empresas.index');
        Route::get('/admin/empresasstore',[CompanyController::class,'store'])->name('store.empresas')->middleware('permisos:empresas.store');
        Route::get('/admin/empresas/{id}',[CompanyController::class,'update'])->name('update.empresas')->middleware('permisos:empresas.update');
        Route::put('/admin/empresas/{id}',[CompanyController::class,'destroy'])->name('destroy.empresas')->middleware('permisos:empresas.destroy');
       
    /*********/

    /* Ruta Marcar ver notificaicones*/ 

    Route::get('markAsRead',function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('notificaciones.leidas');
    /*** */