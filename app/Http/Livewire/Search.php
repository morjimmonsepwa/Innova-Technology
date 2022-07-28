<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Company;
use App\Models\User;

class Search extends Component
{

    public $searchnum;

    public function render()
    {
                
        $empresas = Company::all();
        $ticket = Ticket::where('id',$this->searchnum)->get();
        $users = User::all();

        $param['ticket'] =  $ticket;
        $param['empresas'] = $empresas;
        $param['usuarios'] = $users;


        return view('livewire.search',$param);
    }


}
