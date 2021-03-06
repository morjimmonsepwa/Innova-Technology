<?php

namespace App\Http\Livewire;

use App\Models\Company as companies;
use Livewire\Component;


class CompanyEdit extends Component
{

     //parametros de store
     public $name;

     public $id_company;


    protected $rules = [
        'name' => 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        'name' => 'required'
    ];
         
    protected $messages = [
        'name.required' => 'El campo nombre es requerido.',
        'name.regex' => 'Ingresar solo letras.',
    ];


    public function mount(){

        $this->name = companies::findOrFail($this->id_company)->select('name')->get()[0]['name'];

    }


    public function render()
    {
        $empresa = companies::find($this->id_company);

        return view('livewire.company-edit',compact('empresa'));
    }

    public function edit(){

        $new  = companies::find($this->id_company);

        $validatedData = $this->validate();
        $new->name=$this->name;

        $new->save();


        return redirect()->route('update.empresas',$this->id_company);
    
    }


}
