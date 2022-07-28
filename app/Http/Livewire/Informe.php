<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Detail_group;
use Illuminate\Support\Facades\Auth;
use App\Events\StatusEvent;
use App\Events\AsignarEvent;
use RealRashid\SweetAlert\Facades\Alert;

class Informe extends Component
{
    public $asignado;
    public $nombre;


    public $alert;
    public $nombre_alert;
    public int $status=1;
    protected $listeners = ['alert' => 'alert_run'];

    public function alert_run(){
        $this->alert = true;
    }

    public function render(){

        if(Auth::user()->id_rol == 7 ){
            $tickets = Ticket::where('id_manager',Auth::id())->get();
        }

        if(Auth::user()->id_rol != 7 ){
            $tickets = Ticket::where('id_assigned',Auth::id())->get();
        }

        $users = Detail_group::propios(Auth::id());

        $param['tickets'] = $tickets;
        $param['users'] = $users;

        return view('livewire.informe',$param);
    
    }

    public function asignar($id_user,$id_ticket){

        if($id_user != 0){
            $ticket = Ticket::findOrFail($id_ticket);
            $ticket->id_assigned = $id_user;
            $ticket->save();
            event(new AsignarEvent($ticket));
            $this->emit('alert');
        }

    }

    public function status_ticket($id_estatus,$id_ticket){

        if($id_estatus != 0){

            $ticket = Ticket::findOrFail($id_ticket);
            $ticket->status = $id_estatus;
            $ticket->save();
            event(new StatusEvent($ticket));
            $this->emit('alert');

        }
    }
    

}
