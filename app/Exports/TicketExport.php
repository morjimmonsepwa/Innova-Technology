<?php

namespace App\Exports;

use App\Models\Ticket;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class TicketExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Folio',
            'Asunto',
            'Motivo',
            'Cliente',
            'Vía Queja',
            'Empresa',
            'Producto',
            'Generado',
            'Encargado',
            'Asignado a',
            'Estatus',
            'Fecha Creación',
            'Fecha Actualización',

        ];
    }
    
    public function collection()
    {

        return Ticket::excel();
    
    }
}
