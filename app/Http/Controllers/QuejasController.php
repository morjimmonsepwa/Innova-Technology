<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TicketNotification;
use App\Events\TicketEvent;



class QuejasController extends Controller
{
        // Status
            // 1 = Abierto
            // 2 = Proceso
            // 3 = Cerrado

            // 1 = Email
            // 2 = Llamada

            // 1 = Queja
            // 2 = Devolución

    /**
     * Control de Acceso
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('id_generate',Auth::id())->get();
        $empresas = Company::all();
        $usuarios = User::where('id_rol',2)->get();


        $param['empresas'] = $empresas;
        $param['usuarios'] = $usuarios;
        $param['tickets'] = $tickets;

        return view('admin.pages.quejas.quejas',$param);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $ticket = new Ticket();

        $ticket->affair = $request->asunto;
        $ticket->reason = $request->motivo;   
        $ticket->client = $request->cliente;   
        $ticket->via = $request->via;   
        $ticket->id_business = $request->empresa;   
        $ticket->product = $request->producto;
        $ticket->id_generate = Auth::id();      
        $ticket->id_manager = $request->encargado;    
        $ticket->status = 1;   
        $ticket->save();

        // Se consulta el id del usuario encargado para envio de notificacion
        // User::findOrFail($request->encargado)->notify(new TicketNotification($ticket));

        event(new TicketEvent($ticket));

       return redirect()->route('index.quejas');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $ticket = Ticket::findOrFail($id);

        $ticket->affair = $request->asunto;
        $ticket->reason = $request->motivo;   
        $ticket->client = $request->cliente;   
        $ticket->via = $request->via;   
        $ticket->id_business = $request->empresa;   
        $ticket->product = $request->producto;   
        $ticket->id_manager = $request->encargado;    
        $ticket->save();

       return redirect()->route('index.quejas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $ticket = Ticket::destroy('id', $id);
       
        return redirect()->route('index.quejas');   

    }
}