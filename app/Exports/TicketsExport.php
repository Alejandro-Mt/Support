<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection ;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class TicketsExport implements FromCollection, WithHeadings
{
    /**
     * Obtiene la consulta para exportar los datos de los tickets.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function collection()
    {
        $tickets = Ticket::all();
        $datos = collect();
    
        foreach ($tickets as $ticket) {
            $datos->push([
                'folio'         => $ticket->folio,
                'nivel'         => $ticket->nivel,
                'fecha_reporte' => $ticket->fecha_reporte,
                'cliente'       => $ticket->cliente->nombre,
                'estatus'       => $ticket->estatus->nombre,
                'incidencia'    => $ticket->incidencia->nombre,
                'solicitante'   => $ticket->solicitante ? $ticket->solicitante->nombreCompleto() : ($ticket->invitado ? $ticket->invitado->nombreCompleto() : 'SIN REGISTRO'),
                'email'         => $ticket->id_solicitante,
                'movil'         => $ticket->solicitante ? $ticket->solicitante->usrdata->movil : ($ticket->invitado ? $ticket->invitado->movil : 'SIN REGISTRO'),
                'localidad'     => $ticket->localidad->nombre,
                'sistema'       => $ticket->sistema->nombre,
                'so'            => $ticket->so->nombre,
                'cc'            => $ticket->rCC ? $ticket->rCC->nombreCompleto() : '',
                'pip'           => $ticket->rPIP ? $ticket->rPIP->nombreCompleto() : '',
                'arq'           => $ticket->rAR ? $ticket->rAR->nombreCompleto() : '',
                'op'            => $ticket->rOP ? $ticket->rOP->nombreCompleto() : '',
                'comentario'    => $ticket->comentario->comentario,
                'fecha_creacion'=> $ticket->created_at,
                'ultimo_ajuste' => $ticket->updated_at
            ]);
        }
        return $datos;
    }

    public function headings(): array
    {
        return [
            'Folio',
            'Nivel',
            'Fecha de Reporte',
            'Cliente',
            'Estatus',
            'Incidencia',
            'Solicitante',
            'Email',
            'Movil',
            'Localidad',
            'Sistema',
            'S. Op',
            'RESPONSABLE CC',
            'RESPONSABLE PIP',
            'RESPONSABLE OP',
            'RESPONSABLE ARQ',
            'Comentario',
            'Fecha de Creación',
            'Último Ajuste'
        ];
    }
}
