<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Users as user_controller;


class Users extends Component{

    // parametros store
    public $name;
    public $email;
    public $passsword;
    public $confirmed;
    public $rol;


    protected $rules = [
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'email' => 'required|email:dns',
            'passsword' => 'required|min:6|',
            'confirmed' => 'required|min:6|same:passsword',
            'rol' => 'required'
        ];

    public function updated($propertyName){

        $this->validateOnly($propertyName);
    }

    public function render(){

        $rol = Role::where('id','<>',2)->get();

      
        $param['roles'] = $rol;

        return view('livewire.users',$param);
    }

  
    public function store(){

        $validatedData = $this->validate();
        
        $new = new User();
        $new->name = $this->name;
        $new->email = $this->email;
        $new->password = bcrypt(rtrim($this->passsword));
        $new->id_rol = $this->rol;
        $new->save();
        $this->reset();

        return redirect()->action([user_controller::class, 'store']);
        

    }

   

}

