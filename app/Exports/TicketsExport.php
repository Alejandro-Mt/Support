<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class TicketsExport implements FromQuery, WithHeadings
{
    /**
     * Obtiene la consulta para exportar los datos de los tickets.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return DB::table('tickets as t')
            ->select(
                't.folio',
                't.nivel',
                't.fecha_reporte',
                'c.nombre as cliente',
                'e.nombre as estatus',
                'i.nombre as incidencia',
                DB::raw("CONCAT(s.nombre, ' ', s.a_pat, ' ', s.a_mat) as Solicitante"),
                'l.nombre as localidad',
                'si.nombre as sistema',
                'so.nombre as SO',
                DB::raw("CONCAT(cc.nombre, ' ', cc.a_pat, ' ', cc.a_mat) as cc"),
                DB::raw("CONCAT(pip.nombre, ' ', pip.a_pat, ' ', pip.a_mat) as pip"),
                DB::raw("CONCAT(op.nombre, ' ', op.a_pat, ' ', op.a_mat) as op"),
                DB::raw("CONCAT(arq.nombre, ' ', arq.a_pat, ' ', arq.a_mat) as arq"),
                'com.comentario',
                't.created_at as fecha_creacion',
                't.updated_at as ultimo_ajuste'
            )
            ->leftJoin('clientes as c', 'c.id_cliente', '=', 't.id_cliente')
            ->leftJoin('estatus as e', 'e.id_estatus', '=', 't.id_estatus')
            ->leftJoin('incidencias as i', 'i.id_incidencia', '=', 't.id_incidencia')
            ->leftJoin('users as s', 's.id_user', '=', 't.id_solicitante')
            ->leftJoin('localidades as l', 'l.id_localidad', '=', 't.id_localidad')
            ->leftJoin('sistemas as si', 'si.id_sistema', '=', 't.id_sistema')
            ->leftJoin('so', 'so.id_so', '=', 't.id_so')
            ->leftJoin('users as cc', 'cc.id_user', '=', 't.id_cc')
            ->leftJoin('users as pip', 'pip.id_user', '=', 't.id_pip')
            ->leftJoin('users as op', 'op.id_user', '=', 't.id_op')
            ->leftJoin('users as arq', 'arq.id_user', '=', 't.id_arq')
            ->leftJoin(DB::raw('(SELECT folio, MAX(created_at) AS max_created_at FROM comentarios GROUP BY folio) AS latest_comment'), 'latest_comment.folio', '=', 't.folio')
            ->leftJoin('comentarios as com', function ($join) {
                $join->on('com.folio', '=', 'latest_comment.folio')
                    ->on('com.created_at', '=', 'latest_comment.max_created_at');
            })
            ->whereIn('t.id_sistema', function ($query) {
                $query->select('id_sistema')->from('acceso_sistema')->where('id_user', 244);
            })
            ->orderBy('t.folio', 'asc');
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
