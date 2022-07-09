<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\User;
use App\Models\Ticket as _ticket;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TicketNotification;
use App\Events\TicketEvent;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\QuejasController;

class Ticket extends Component
{
    public $asunto;
    public $motivo; 
    public $cliente;
    public $via;
    public $producto;
    public $encargado;
    public $empresa;

    // $this->asunto;
    // $this->motivo; 
    // $this->cliente,
    // $this->via;
    // $this->producto;
    // $this->encargado;


    public function render()
    {

        $empresas = Company::all();
        $usuarios = User::where('id_rol',7)->get();

        $param['empresas'] = $empresas;
        $param['usuarios'] = $usuarios;
    
        return view('livewire.ticket',$param);
    }

    protected $rules = [
            'asunto' => 'required',
            'motivo' => 'required',
            'cliente' => 'required',
            'via' => 'required',
            'empresa' => 'required',
            'producto' => 'required',
            'encargado' => 'required'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function store(){
  
        $validatedData = $this->validate();

        $ticket = new _ticket();

        $ticket->affair = $this->asunto;
        $ticket->reason = $this->motivo;   
        $ticket->client = $this->cliente;   
        $ticket->via = $this->via;   
        $ticket->id_business = $this->empresa;   
        $ticket->product = $this->producto;
        $ticket->id_generate = Auth::id();      
        $ticket->id_manager = $this->encargado;    
        $ticket->status = 1;   
        $ticket->save();
        
        // Se consulta el id del usuario encargado para envio de notificacion
        // User::findOrFail($request->encargado)->notify(new TicketNotification($ticket));

        event(new TicketEvent($ticket));
        $this->reset();

        return redirect()->action([QuejasController::class, 'store']);




    }












}
