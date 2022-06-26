<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Detail_group;
use Illuminate\Support\Facades\Auth;

class Informe extends Component
{
    public $asignado;

    public function render(){

    
        $tickets = Ticket::where('id_manager',Auth::id())->get();
        $users = Detail_group::propios(Auth::id());

        $param['tickets'] = $tickets;
        $param['users'] = $users;


        return view('livewire.informe',$param);
    
    }

    public function asignar($id_user,$id_ticket){

        $ticket = Ticket::findOrFail($id_ticket);
        $ticket->id_assigned = $id_user;
        $ticket->save();
    }

}
