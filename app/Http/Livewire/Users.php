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
            'confirmed' => 'required|same:passsword',
            'rol' => 'required'
        ];
        
    protected $messages = [
        'name.required' => 'El campo nombre es requerido.',
        'name.regex' => 'Ingresar solo letras.',
        'email.required' => 'El campo correo es requerido.',
        'email.email' => 'Debe ser una dirección de correo válida.',
        'passsword.required' => 'El campo contraseña es requerido.',
        'passsword.min' => 'La contraseña debe ser mayor a 6 caracteres.',
        'passsword.required' => 'El campo contraseña es requerido.',
        'confirmed.required' => 'El campo confirmar es requerido.',
        'confirmed.same' => 'No coincide la contraseña.',
        'rol.required' => 'El campo rol es requerido.'
        
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