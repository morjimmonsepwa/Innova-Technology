<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\User;
use App\Models\Ticket;


class TicketEdit extends Component
{

    public $id_ticket;

    public $asunto;
    public $motivo; 
    public $cliente;
    public $via;
    public $producto;
    public $encargado;
    public $company;

    public function mount(){

        $ticket = Ticket::find($this->id_ticket);
        

        $this->asunto =$ticket->affair;
        $this->motivo =$ticket->reason; 
        $this->cliente =$ticket->client;
        $this->via =$ticket->via;
        $this->producto =$ticket->product;
        $this->encargado =$ticket->id_manager;
        $this->company =$ticket->id_business;

        
    }

    public function render()
    {
        
        $empresas = Company::all();
        $usuarios = User::where('id_rol',7)->get();

        $param['empresas'] = $empresas;
        $param['usuarios'] = $usuarios;

        return view('livewire.ticket-edit',$param);
    }

    protected $rules = [
        'asunto' => 'required',
        'motivo' => 'required',
        'cliente' => 'required',
        'via' => 'required',
        'company' => 'required',
        'producto' => 'required',
        'encargado' => 'required'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function update(){

        $validatedData = $this->validate();

        $ticket = Ticket::findOrFail($this->id_ticket);

        $ticket->affair = $this->asunto;
        $ticket->reason = $this->motivo;   
        $ticket->client = $this->cliente;   
        $ticket->via = $this->via;   
        $ticket->id_business = $this->company;   
        $ticket->product = $this->producto;   
        $ticket->id_manager = $this->encargado;    
        $ticket->save();

        return redirect()->route('update.quejas',$this->id_ticket);
        

    }



}
