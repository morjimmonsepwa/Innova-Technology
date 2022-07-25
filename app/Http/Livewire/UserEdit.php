<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Users;



class UserEdit extends Component
{
    public $user_id;

    public $name;
    public $email;
    public $passsword;
    public $confirmed;
    public $id_rol;

    public function mount(){

        $user  = User::find($this->user_id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->id_rol = $user->id_rol;
            

    }

    protected $rules = [
        'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        'email' => 'required|email:dns',
        'id_rol' => 'required'
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


    public function render()
    {
        $rol = Role::where('id','<>',2)->get();

        $param['roles'] = $rol;

        return view('livewire.user-edit',$param);
    }


    public function update(){

        $validatedData = $this->validate();

        $new = User::find($this->user_id);

        if($this->passsword != ''){

            $this->validate([
                'passsword' => 'min:6|',
                'confirmed' => 'min:6|same:passsword'
            ]);
 
            $new->password = bcrypt(rtrim($this->passsword));

        }
           
        
        $new->name = $this->name;
        $new->email = $this->email;
        $new->id_rol = $this->id_rol;
        $new->save();

        return redirect()->route('update.users',$this->user_id);
        
        
    }

}