<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;


class Users extends Component{

    // parametros store
    public $name;
    public $email;
    public $passsword;
    public $confirmed;
    public $rol;

    //parametros alerta success
    public $alert;
    public int $status=1;
    protected $listeners = ['alert' => 'alert_run'];


    protected $rules = [
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'email' => 'required|email:dns',
            'passsword' => 'required|min:6|',
            'confirmed' => 'required|min:6|same:passsword',
            'rol' => 'required'
        ];

    public function name($name){
        $this->name=$name;
    }

    public function email($email){
        $this->email=$email;
    }

    public function rol($rol){
        $this->rol=$rol;
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);
    }

    public function alert_run(){
		$this->alert = true;
    }

    public function render(){

        $user=User::all();
        $rol = Role::all();

        $param['users'] = $user;
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
        
        $this->emit('alert');
        $this->reset();

    }

    public function actualizar($id){

        // dd($id,$this->name,$this->email,$this->rol,$this->passsword,$this->confirmed);
        $new = User::find($id);

        if($this->name != ''){

            $this->validate([
                'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
            ],[
                'name.required' => 'El campo nombre es obligatorio',
                'name.regex' => 'El campo nombre solo permite letras'
            ]);

            $new->name = $this->name;
        }

        if($this->email != ''){

            $this->validate([
                'email' => 'required|email:dns'
            ],[
                'email.required' => 'El campo correo es obligatorio',
                'email.email' => 'El campo correo debe ser un correo valido'
            ]);

            $new->email = $this->email;
        }


        if($this->rol != ''){

            $this->validate([
                'rol' => 'required'
            ],[
                'rol.required' => 'El campo rol es obligatorio'
            ]);

            $new->id_rol = $this->rol;
        }


        if($this->passsword != '' && $this->confirmed != ''){
            
            $new->password = bcrypt(rtrim($this->passsword));

        }

        $new->save();
        
        $this->emit('alert');
       
    }

}

