<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Work_group;

class GroupsEdit extends Component
{
    public $id_group;
    public $name;

    public $alert;
    public int $status=1;
    protected $listeners = ['alert' => 'alert_run'];

    protected $rules = [
            'name' => 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
        ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function name($name){

        $this->name=$name;
     
    }

    public function alert_run(){
		$this->alert = true;
    }

    public function render()
    {
        $group = Work_group::all()->where('id',$this->id_group);
       
        return view('livewire.groups-edit',compact('group'));
    }

    
     public function edit(){

        $new  = work_group::find($this->id_group);
       
        if($this->name != ''){
            $validatedData = $this->validate();
            $new->name=$this->name;
        }

        $new->save();

        return redirect()->route('update.grupos',$this->id_group);
     }

}
