<?php

namespace App\Http\Livewire;

use App\Models\Work_group;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WorkGroupController;

class Groups extends Component
{
    //parametros de store
    public $name;

    protected $rules = [
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
        ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.groups');
    }



    public function store(){
    
        $validatedData = $this->validate();

        $group = new Work_group();
        $group->name = $this->name;
        $group->id_leader = Auth::id();
        $group->save();
        $this->reset();

        return redirect()->action([WorkGroupController::class, 'store']);
    
    }


}
