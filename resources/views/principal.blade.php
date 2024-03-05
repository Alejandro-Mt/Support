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
