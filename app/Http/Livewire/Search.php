<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;

class Search extends Component
{

    public $searchnum = 0;
    public $resultado;



    public function mount(){

        if(is_integer($this->searchnum )){
            $this->resultado = Ticket::where('id',$this->searchnum)->get();
        }
    
        if(is_string($this->searchnum )){
            $this->resultado = Ticket::where('reason',$this->searchnum)->get();
        }
        
    }



    public function render()
    {
        
        $ticket = $this->resultado;

        $param['ticket'] =  $ticket;

        return view('livewire.search',$param);
    }
}
