<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
        $empresa = new Company();

        $empresa->name = $request->name;
        $empresa->save();

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
        $empresa = Company::findOrFail($id);

        $empresa->name = $request->name;
        $empresa->save();

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
       
        return redirect()->route('index.empresas');

    }


}
