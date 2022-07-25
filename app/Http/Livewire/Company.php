<?php

namespace App\Http\Livewire;

use App\Models\Company as companies;
use Livewire\Component;
use App\Http\Controllers\CompanyController;

class Company extends Component
{

     //parametros de store
     public $name;


     protected $rules = [
        'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
    ];
    
    
    protected $messages = [
        'name.required' => 'El campo nombre es requerido.',
        'name.regex' => 'Ingresar solo letras.',
    ];
 
     public function updated($propertyName){
         $this->validateOnly($propertyName);
     }
 
     public function render()
     {
         return view('livewire.company');
     }
 
 
     public function store(){
     
         $validatedData = $this->validate();
 
         $empresa = new companies();
         $empresa->name = $this->name;
         $empresa->save();
         $this->reset();
 
         return redirect()->action([CompanyController::class, 'store']);
     
     }




}
