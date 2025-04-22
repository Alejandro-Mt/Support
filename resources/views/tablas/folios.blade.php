
<div class="table-responsive tab-pane fade" id="Principal" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table id="excel" class="table table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
      <tr>
        <th class="header">LISTA</th>
        <th class="header">FOLIO</th>
        <th class="header">SOLICITANTE</th>
        <th class="header">COMENTARIO</th>
        <th class="header">ESTATUS</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tabla as $registro)
      <tr>
        <td>{{$registro->id_ticket}}</td>
        <td>
          <a href={{ route('Seguimiento_Soporte',$registro->folio) }} data-bs-toggle="tooltip" data-bs-placement="auto"
            @switch( $registro->id_estatus )
              @case(1)
                class="btn btn-warning"
                @break
              @case(2)
                class="btn btn-secondary"
                @break
              @case(3)
                class="btn btn-danger"
                @break
              @case(4)
                class="btn btn-info"
                @break
              @default
                class="btn btn-dark"
            @endswitch
            title="Sistema: {{ $registro->sistema->nombre }}
            Cliente: {{ $registro->cliente->nombre }}
            Nivel: {{ $registro->estatus->nivel }}
            Estatus: {{ $registro->estatus->nombre }}
            @if($registro->incidencia)
            Incidencia: {{ $registro->incidencia->nombre }}
            @endif
            @if($registro->rCC)
              Responsable CC: {{ $registro->rCC->nombreCompleto() }}
            @endif
            @if($registro->rPIP)
              Responsable PIP: {{ $registro->rPIP->nombreCompleto() }}
            @endif
            Fecha de reporte: {{ date('d/M/Y H:i:s', strtotime($registro->fecha_reporte)) }}
          "
          >{{$registro->folio}}</a>
        </td>
        <td data-bs-toggle="tooltip" data-bs-placement="auto" title="Correo: {{ $registro->solicitante ? $registro->solicitante->email : $registro->id_solicitante}},&#10;Teléfono: {{ $registro->invitado ? $registro->invitado->movil : 'Sin registro'}}&#10;">
          {{$registro->solicitante ? $registro->solicitante->nombreCompleto() : $registro->id_solicitante}}
        </td>
        <td data-bs-toggle="tooltip" title="{{ $registro->comentario->comentario }}"> 
          <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">
            <div style="max-width: 300px;">{{$registro->comentario->comentario}}</div>
          </div>
        </td>
        <td>{{$registro->estatus->nombre}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>LISTA</th>
        <th>FOLIO</th>
        <th>SOLICITANTE</th>
        <th>COMENTARIO</th>
        <th>ESTATUS</th>
      </tr>
    </tfoot>
  </table>
</div>