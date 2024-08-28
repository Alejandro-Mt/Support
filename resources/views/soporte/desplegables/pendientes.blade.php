<!-- Autorizacion 2 -->
<div class="modal fade" id="Pendientes" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title">
          <strong>Folios pendientes por cerrar</strong>
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="table-responsive tab-pane fade show active" id="Pendientes" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table id="PendientesID" class="table table-striped table-bordered display text-nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th class="header">Folio</th>
                  <th class="header">Comentario</th>
                  <th class="header">Inicio</th>
                  <th class="header">Estatus</th>
                  <th class="header">Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach (Auth::user()->Pendientes() as $pendiente)
                <tr>
                  <td>
                    {{$pendiente->folio}}
                  </td>
                  <td data-bs-toggle="tooltip" title="{{ $pendiente->comentarioPadre() ? $pendiente->comentarioPadre() : '' }}"> 
                    <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">
                      <div style="max-width: 300px;">{{ $pendiente->comentarioPadre() ? $pendiente->comentarioPadre() : '' }}</div>
                    </div>
                  </td>
                  <td>{{$pendiente->fecha_reporte}}</td>
                  <td>{{$pendiente->estatus->nombre}}</td>
                  <td class="text-center fw-bold">
                    <a href={{ route('Seguimiento_Soporte',$pendiente->folio) }} class="text-success fw-bold">
                      <i class="feather-sm" data-feather="play"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Folio</th>
                  <th>Comentario</th>
                  <th>Inicio</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light text-white" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    