@extends('home')
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset("assets/extra-libs/DataTables/css/dataTables.bootstrap4.css")}}"/>
<link rel="stylesheet" href="{{asset("assets/extra-libs/toastr/dist/build/toastr.min.css")}}"/>
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap/dist/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/style.min.css")}}">
@section('content')
@if (session('success'))
    <input class="d-none" id="folio" value={{ session('success') }}>
    <script>
        $(document).ready(function(){
            toastr.success(
                "N° folio: " + $("#folio").val(),
                "¡Guardado!",
                { showMethod: "slideDown", hideMethod: "slideUp", timeOut: 2000 }
            );
        });
    </script>
@endif
@if (session('Usr_data'))
  <input class="d-none" id="folio" value={{ session('Usr_data') }}>
  <script>
      $(document).ready(function(){
          toastr.success(
              "Datos actualizados!",
              { showMethod: "slideDown", hideMethod: "slideUp", timeOut: 2000 }
          );
      });
  </script>
@endif
<!--@ if(Auth::user()->id_puesto > 3)-->
<!-- Script para mostrar el modal si hay registros -->
@if(Auth::user()->Pendientes()->count() > 0)
    <script>
        $(document).ready(function() {
            $('#Pendientes').modal('show');
        });
    </script>
@endif
<!--include('soporte.desplegables.pendientes')-->

<!-- Row  Resumen-->
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <button class="btn btn-light-primary font-weight-medium text-white px-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cards" aria-expanded="false" aria-controls="cards">
        <i data-feather="book" class="feather-sm"></i>
        Valor
      </button>
      <div id="cards" class="card-body collapse">
        <div class="d-flex justify-content-between align-items-center">
          <!-- Tarjeta 1 -->
          <div class="col-md-4 col-sm-4">
            <div class="card bg-success h-100"> <!-- Altura completa -->
              <div class="card-body text-white h-100 p-0 d-flex"> <!-- Flex y sin padding -->
                <div class="d-flex flex-row h-100 w-100"> <!-- Contenedor flexible -->
                  <div class="d-flex align-items-center p-3"> <!-- Icono con padding -->
                    <div class="round round-success d-flex justify-content-center align-items-center bg-light-success text-success">
                      <i data-feather="credit-card" class="feather-sm"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 d-flex flex-column h-100 pe-3 py-3"> <!-- Área de contenido -->
                    <h4 class="mb-2">Soportes PIP</h4>
                    <ul class="overflow-auto mb-0 flex-grow-1" style="max-height: 3em;">
                      @foreach ($tabla->whereNotNull('id_pip')->groupBy('id_pip') as $id_pip => $ticketsPorPip)
                        <li class="d-flex justify-content-between">
                          <span>{{ $ticketsPorPip->first()->rPIP->nombreCompleto() }}</span>
                          <span>{{ $ticketsPorPip->count() }}</span>
                        </li>
                      @endforeach
                    </ul> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Tarjeta 2 -->
          <div class="col-md-4 col-sm-4">
            <div class="card bg-info h-100"> <!-- Altura completa -->
              <div class="card-body text-white h-100 p-0 d-flex"> <!-- Flex y sin padding -->
                <div class="d-flex flex-row h-100 w-100"> <!-- Contenedor flexible -->
                  <div class="d-flex align-items-center p-3"> <!-- Icono con padding -->
                    <div class="round round-info d-flex justify-content-center align-items-center bg-light-info text-info">
                      <i data-feather="credit-card" class="feather-sm"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 d-flex flex-column h-100 pe-3 py-3"> <!-- Área de contenido -->
                    <h4 class="mb-2">Soportes por sistema</h4>
                    <ul class="overflow-auto mb-0 flex-grow-1" style="max-height: 3em;"> <!-- Lista expandible -->
                      @foreach ($tabla->whereNotNull('id_sistema')->groupBy('id_sistema') as $id_sistema => $ticketsPorSis)
                        <li class="d-flex justify-content-between">
                          <a data-bs-toggle="tooltip" title="Sistema: {{ $ticketsPorSis->first()->incidencia->nombre }}" data-bs-placement="auto">
                            {{$ticketsPorSis->first()->sistema->nombre}}
                          </a>
                          <span>{{$ticketsPorSis->count()}}</span>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <!-- Tarjeta 3 -->
          <div class="col-md-4 col-sm-4">
            <div class="card bg-primary h-100">
              <div class="card-body text-white h-100 p-0 d-flex">
                <div class="d-flex flex-row h-100 w-100">
                  <div class="d-flex align-items-center p-3"> <!-- Icono con padding -->
                    <div class="round round-info d-flex justify-content-center align-items-center bg-light-primary text-primary">
                      <i data-feather="credit-card" class="feather-sm"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 d-flex flex-column h-100 pe-3 py-3"> <!-- Área de contenido -->
                    <h4 class="mb-2">De negocios cerrados</h4>
                    <ul class="overflow-auto mb-0 flex-grow-1" style="max-height: 3em;">
                      @foreach ($tabla->whereNotNull('id_cc')->groupBy('id_cc') as $id_cc => $ticketsPorCC)
                        <li class="d-flex justify-content-between">
                          <span>{{ $ticketsPorCC->first()->rCC->nombreCompleto() }}</span>
                          <span>{{ $ticketsPorCC->count() }}</span>
                        </li>
                      @endforeach
                    </ul> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-title">  
          <div class="row">
            <!-- Titulo -->
            <!-- Contenido -->
            <div class="nav justify-content-center">
              <!-- Filtros -->
              @include('layouts.menu')
            </div>
            <!-- tablas -->
          </div>
        </div>
        <div class="row">
          <div class="nav justify-content-center">
            <div class="nav tab-content mt-3" id="pills-tabContent">
              @include('tablas.folios')
              @include('tablas.ourfolios')
              @include('catalogos.cliente')
              @include('catalogos.departamento')
              @include('catalogos.division')
              @include('catalogos.puesto')
              @include('catalogos.roles')
              @include('catalogos.sistema')
              @include('catalogos.incidencia')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
<style>
  .tooltip-inner {
      background-color: black;
      box-shadow: 0px 0px 4px black;
      color: #f4f6f9;
      max-width: 100%; 
      opacity: 1 !important;
      white-space: pre-line;
      word-wrap: break-word;
      text-align: left;
  }

  .tooltip.bs-tooltip-end .tooltip-arrow::before {
    border-right-color: black
  }

  /* Define los estilos para las filas pares */
  .table-striped tbody tr:nth-child(even) {
      background-color: #D4D4D4; /* Color para las filas pares */
      color: darkgray
  }
  /* Define los estilos para las filas impares */
  .table-striped tbody tr:nth-child(odd) {
      background-color: #D4D4D4; /* Color para las filas impares */
  }
</style>
<!--@ endif-->
 
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset("assets/libs/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset("assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
<!--Wave Effects -->
<script src="{{asset("assets/js/waves.js")}}"></script>
<script src="{{asset("assets/extra-libs/DataTables/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/extra-libs/toastr/dist/build/toastr.min.js")}}"></script>

<script>
  $(function(){
    $('form').submit(function(){
      $(':submit').attr('disabled', 'disabled');
    })
  });
</script>
<!--<script>
  $(document).ready(function () {
    $('#excel').DataTable({
        scrollY: 500,
        scrollX: true,
    });
    $(".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel, .buttons-GSheets").addClass("btn btn-primary mr-1");
    function exportToSheets(data){
      $.ajax({
        headers: {'X-CSRF-TOKEN' : "{{csrf_token()}}"},
        type: "POST",
        url: "gsheets",
        data:{data:data}
      })
    }
  });
</script>
<script>
  $(document).ready(function () {
    var table = $('#excel').DataTable({
      scrollY: 500,
      scrollX: true,
      pageLength: 10, // Establece la cantidad de registros por página
      lengthMenu: [10, 25, 50, 75, 100], // Opciones de cantidad de registros por página
      searching: true // Habilita la opción de búsqueda
      //dom: 'Bfrtip', // Habilita los botones de la extensión Buttons
      //buttons: ['copy', 'csv', 'excel', 'pdf', 'print' ],// Botones para copiar, CSV, Excel, PDF y impresión
      /*columnDefs: [
        { targets: '_all', className: 'editable' } // Hace todas las columnas editables
      ],*/
      colReorder: true, // Habilita la extensión de reordenamiento de columnas
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
      }
    });

    // Para exportar a Google Sheets
  });
</script>-->
<!-- Para ambas tablas 'excel' y 'ourtickets' -->
<script src="{{asset("assets/extra-libs/DataTables/js/jquery.dataTables.min.js")}}"></script>
<script>
  $(document).ready(function () {
    // Configuración común para ambas tablas
    var commonTableOptions = {
      scrollY: 500,
      scrollX: true,
      pageLength: 10,
      lengthMenu: [10, 25, 50, 75, 100],
      searching: true, // Habilita la opción de búsqueda
    };

    // Inicialización de DataTable para la tabla 'excel'
    $('#excel').DataTable(commonTableOptions);

    // Inicialización de DataTable para la tabla 'ourtickets'
    $('#ourtickets').DataTable(commonTableOptions);
  });
</script>


  
@endsection
