<?php

namespace App\Http\Livewire;

use App\Models\Detail_group;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Asigneusers extends Component
{
    public $id_group;


    public function render(){
    
    $detail = Detail_group::where('id_group',$this->id_group)->get();
    $users = Detail_group::diferentes($this->id_group)->where('id','<>',Auth::id());
    $roles = Role::all();

    $param['details'] = $detail;
    $param['users'] = $users;
    $param['roles'] = $roles;

        return view('livewire.asigneusers',$param);
    }

    public function delete_user($id){

        Detail_group::destroy('id', $id);
        
    }

    public function asigned_user($id){
    
        $user = neW Detail_group();
        $user->id_group = $this->id_group;
        $user->id_user = $id;
        $user->save();
        
    }



}
