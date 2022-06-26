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
    
    /***********************/

    /* Rutas Administrador */
        
        Route::get('/dashboard',[Web::class,'dashboard'])->name('dashboard')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->middleware('permisos:dashboard');
        // Route::get('/dashboard',[Web::class,'dashboard'])->name('dashboard')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']);
    /***********************/


    /* Rutas Administrador Users*/
        
        Route::get('/admin/users',[Users::class,'index'])->name('index.users');
        Route::get('/admin/users/create',[Users::class,'create'])->name('create.users');
        Route::post('/admin/users',[Users::class,'store'])->name('store.users');
        Route::get('/admin/users/{id}',[Users::class,'show'])->name('show.users');
        Route::get('/admin/users/{id}/edit',[Users::class,'edit'])->name('edit.users');
        Route::patch('/admin/users/{id}',[Users::class,'update'])->name('update.users');
        Route::put('/admin/users/{id}',[Users::class,'destroy'])->name('destroy.users');
       

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
        
        Route::get('/admin/grupos',[WorkGroupController::class,'index'])->name('index.grupos');
        Route::post('/admin/grupos',[WorkGroupController::class,'store'])->name('store.grupos');
        Route::put('/admin/grupos/{id}',[WorkGroupController::class,'destroy'])->name('destroy.grupos');
        Route::patch('/admin/grupos/{id}',[WorkGroupController::class,'update'])->name('update.grupos');

    /***********************/

    /* Rutas Administrador Quejas*/
        
        Route::get('/admin/quejas',[QuejasController::class,'index'])->name('index.quejas');
        Route::post('/admin/quejas',[QuejasController::class,'store'])->name('store.quejas');
        Route::put('/admin/quejas/{id}',[QuejasController::class,'destroy'])->name('destroy.quejas');
        Route::patch('/admin/quejas/{id}',[QuejasController::class,'update'])->name('update.quejas');

    /***********************/


    /* Rutas Administrador Empresas*/
        
        Route::get('/admin/empresas',[CompanyController::class,'index'])->name('index.empresas');
        Route::post('/admin/empresas',[CompanyController::class,'store'])->name('store.empresas');
        Route::patch('/admin/empresas/{id}',[CompanyController::class,'update'])->name('update.empresas');
        Route::put('/admin/empresas/{id}',[CompanyController::class,'destroy'])->name('destroy.empresas');
       

    /***********************/
