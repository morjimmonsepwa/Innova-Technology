<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Company::all();
        
        $param['empresas'] = $empresas;
        
        return view('admin.pages.empresas.empresas',$param);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        $empresa = new Company();

        $empresa->name = $request->name;
        $empresa->save();

        Alert::toast('Guardado Correctamente','success');
        return redirect()->route('index.empresas');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        $empresa = Company::findOrFail($id);

        $empresa->name = $request->name;
        $empresa->save();

        Alert::toast('Actualizado Correctamente','success');
        return redirect()->route('index.empresas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,$id)
    {

        $empresa = Company::destroy('id', $id);
       

        Alert::toast('Eliminado Correctamente','success');
        return redirect()->route('index.empresas');

    }


}
