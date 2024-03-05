<?php

namespace App\Imports;

use App\Models\Comentario;
use App\Models\Estatus;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TicketImport implements ToArray
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function array(array $rows)
    {
        $headers = $rows[0];
        unset($rows[0]);
        
        foreach ($rows as $row) {
          if (count($row) >= 1) {
            $rol        = Auth::user()->usrdata->rol->id_rol;
            $fecha      = Date::excelToDateTimeObject($row[0]);
            $nivel      = Estatus::where('id_estatus',(int)$row[7])->first();
            //$nivel      = $nivel ? $nivel->nivel : 2;
            if($nivel) {$nivel->nivel = 2;}
            /*$invitado=Invitado::updateOrCreate(
                ['email'    => (int)$row['4']],
                [
                  'nombre'  => strtoupper((int)$row[0]),
                  'a_pat'   => strtoupper((int)$row[1]),
                  'a_mat'   => strtoupper((int)$row[2]),
                  'movil'   => (int)$row[3]
                ]
            );*/
            
            $ticket = new Ticket([
                'fecha_reporte'     => $fecha,
                'id_cliente'        => (int)$row[1],
                'id_localidad'      => (int)$row[2],
                'id_sistema'        => (int)$row[3],
                'id_so'             => (int)$row[4],
                'id_incidencia'     => (int)$row[5],
                'id_solicitante'    => (int)$row[6],
                'nivel'             => $nivel->nivel,
                'id_estatus'        => (int)$row[7],
                'id_cc'             => (int)$row[8],
                'id_pip'            => (int)$row[9]
            ]);
            $ticket->save();
            $comentario = new Comentario([
                'folio'     => $ticket->folio,
                'id_user'   => (int)$row[9],
                'comentario'=> $row[10],
                'tipo'      => 'padre',
                'id_estatus'=> (int)$row[7],
            ]);
            $comentario->save();
          }
        }
    }
}
