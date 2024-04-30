<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TicketImport implements ToArray, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function mapping(): array
    {
      return [
        'fecha_soporte'       => 'A1',
        'hora'                => 'B1',
        'cliente'             => 'C1',
        'localidad'           => 'D1',
        'sistema'             => 'E1',
        'sop'                 => 'F1',
        'incidencia'          => 'G1',
        'solicitante'         => 'H1',
        'comentario'          => 'I1'
      ];
    }
    public function array(array $rows)
    {
        foreach ($rows as $row) {
          $ticketData = [
            'fecha_reporte' => $row['fecha_soporte'],
            'hora' => $row['hora'],
            'id_cliente' => $row['cliente'],
            'id_localidad' => $row['localidad'],
            'id_sistema' => $row['sistema'],
            'id_so' => $row['s_op'],
            'id_incidencia' => $row['incidencia'],
            'id_solicitante' => $row['solicitante'],
            'comentario' => $row['comentario'],
          ];
          $data[] = $ticketData;
          #dd($data);
        }
        #dd($data);

        return $data;
    }
}
