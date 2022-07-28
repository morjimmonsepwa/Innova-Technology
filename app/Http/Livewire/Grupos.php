<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Work_group;
use App\Models\Detail_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Grupos extends Component
{
    public function render()
    {

        $groups = Work_group::all()->where('id_leader',Auth::id());

        $details = Detail_group::all()->take($groups->count()*4);

        $param['groups'] = $groups;
        $param['details'] = $details;



        return view('livewire.grupos',$param);
    }


    public function destroy($id)
    {
        if(Detail_group::where('id_group',$id)->get()->count() <> 0){
            Alert::toast('Usuarios Asignados','error');
        }else{
            Work_group::destroy('id', $id);
            Alert::toast('Eliminado Correctamente','success');
        }
        
        return redirect()->route('index.grupos');
    }
    
}
