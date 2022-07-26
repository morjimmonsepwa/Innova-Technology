<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Role;
use App\Http\Controllers\Permisos;
use App\Http\Controllers\Roles as rol;

class Roles extends Component
{
    public $name;
    public $permiso;

    protected $rules = [
        'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    protected $messages = [
        'name.required' => 'El campo nombre es requerido.',
        'name.regex' => 'Ingresar solo letras.',
    ];



    public function render()
    {

        $param['permisos'] = Permisos::get(true);

        return view('livewire.roles',$param);
    }

    public function store(){

        $validatedData = $this->validate();

        $guardar = $this->permiso ?? array();
        $permisos = array();
        $permisosfn = array();

        $permisos= array_merge(array_column($guardar,'index'),array_column($guardar,'store'),array_column($guardar,'update'),array_column($guardar,'destroy'));

        $new = new Role();
        $new->name = $this->name;

        if($this->permiso !=''){
            
            foreach($permisos as $key=>$value){
                $permisosfn [$value] = true;
            }

            $new->permisos = json_encode($permisosfn);
        }else{
            $new->permisos=null;
        }

        $new->save();
        $this->reset();
        
        return redirect()->action([rol::class, 'store']);

    }


}
