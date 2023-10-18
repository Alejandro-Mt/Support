@extends('home')
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset("assets/extra-libs/DataTables/css/dataTables.bootstrap4.css")}}"/>
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap/dist/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/style.min.css")}}">
@section('content')
  
  <!--@ if(Auth::user()->id_puesto > 3)-->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="excel" class="table table-striped table-bordered display text-nowrap" style="width: 100%">
                <thead>
                  <tr>
                    <th class="header">LISTA</th>
                    <th class="header">FOLIO</th>
                    <th class="header">SOLICITANTE</th>
                    <th class="header">DESCRIPCIÓN</th>
                    <th class="header">NIVEL</th>
                    <th class="header">SISTEMA</th>
                    <th class="header">CLIENTE</th>
                    <th class="header">COMENTARIO</th>
                    <th class="header">ESTATUS</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tabla as $registro)
                  <tr>
                    <td>{{$registro->id}}</td>
                    <td><a href="" style="color:rgb(85, 85, 85)">{{$registro->folio}}</a></td>
                    <td>{{$registro->nombre_cl}}</td>
                    <td>{{$registro->incidencia->nombre}}</td>
                    <td>clase</td>
                    <td>{{$registro->sistema->nombre}}</td>
                    <td>{{$registro->cliente->nombre}}</td>
                    <td>comentario</td>
                    <td>estatus</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>LISTA</th>
                    <th>FOLIO</th>
                    <th>SOLICITANTE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>NIVEL</th>
                    <th>SISTEMA</th>
                    <th>CLIENTE</th>
                    <th>COMENTARIO</th>
                    <th>ESTATUS</th>
                  </tr>
                </tfoot>
              </table>
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

<script>
  $(function(){
    $('form').submit(function(){
      $(':submit').attr('disabled', 'disabled');
    })
  });
</script>
<script>
    $(document).ready(function () {
      $('#excel').DataTable({
        //dom: "Bfrtip",
        /*buttons: ["copy", "csv", "excel", "pdf", "print",
        {
        text: 'GSheets',
        className: 'buttons-GSheets',
        action: function ( e, dt, button, config ) {
          var data = dt.buttons.exportData();
          exportToSheets(data);
        }
      }],*/
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

  
@endsection
