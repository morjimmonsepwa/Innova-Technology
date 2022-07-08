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
             'name' => 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
         ];
 
    public function updated($propertyName){
         $this->validateOnly($propertyName);
    }

    public function render()
    {
        $empresa = companies::find($this->id_company);

        return view('livewire.company-edit',compact('empresa'));
    }

    public function edit(){

        $new  = companies::find($this->id_company);

        if($this->name != ''){
            $validatedData = $this->validate();
            $new->name=$this->name;
        }

        $new->save();


        return redirect()->route('update.empresas',$this->id_company);
    
    }


}
