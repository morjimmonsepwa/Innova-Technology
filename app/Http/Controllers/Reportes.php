<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Company;
use App\Models\User;
use App\Exports\TicketExport;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Reportes extends Controller
{
 
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
        $tickets = Ticket::all();

        $param['tickets'] = $tickets;


        return view('admin.pages.reportes.reportes',$param);
    }

    public function pdf($id){

        $ticket = Ticket::find($id);
        $empresas = Company::all();
        $usuarios = User::all();

        $param['empresas'] = $empresas;
        $param['usuarios'] = $usuarios;

        $pdf = PDF::loadView('admin.pages.reportes.reporte-pdf',compact('ticket'),$param);
        set_time_limit(300);
        return $pdf->download('reporte.pdf');


        // return view('admin.pages.reportes.reporte-pdf',compact('ticket'),$param);
        
    }

    public function excel(){

        return Excel::download(new TicketExport, 'Ticket.xlsx');

    }


}