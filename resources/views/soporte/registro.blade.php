@extends('home')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap-datepicker/dist/css/jquery.datetimepicker.min.css")}}">
<!--<link rel="stylesheet" ref="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">-->
<link rel="stylesheet" href="{{asset("assets/extra-libs/DataTables/css/dataTables.bootstrap4.css")}}"/>
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap/dist/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/style.min.css")}}">
@section('content')

<div class="container">
  <h1>Soporte</h1>
  <form method="POST" action={{ route('Reg_Sop') }}>
    {{ csrf_field() }}
    <div class="card">
      <div class="card-head m-3">
        <h4>DATOS DE QUIEN REPORTA</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="nombre" class="col-sm-2 text-end control-label col-form-label">Nombre Prom</label>
          <div class= 'col-md-8'>
            <input type="text" class="form-control" id="nombre" name="nombre_prom" placeholder="Nombre(s)">
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="a_pat" class="col-sm-2 text-end control-label col-form-label">Apellido Paterno</label>
          <div class= 'col-md-8'>
            <input type="text" class="form-control" id="a_pat" name="a_pat" placeholder="Paterno">
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="a_mat" class="col-sm-2 text-end control-label col-form-label">Apellido Materno</label>
          <div class= 'col-md-8'>
            <input type="text" class="form-control" id="a_mat" name="a_mat" placeholder="Materno">
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="movil" class="col-sm-2 text-end control-label col-form-label">Teléfono Móvil</label>
          <div class= 'col-md-8'>
            <input type="number" class="form-control" id="movil" name="movil" placeholder="55 1234 5678" pattern="[0-9]{1,10}" maxlength="10">
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="email" class="col-sm-2 text-end control-label col-form-label">e-mail</label>
          <div class= 'col-md-8'>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@hello.com">
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-head m-3">
        <h4>DATOS DE SOPORTE</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="datepicker-autoclose" class="col-sm-2 text-end control-label col-form-label">Fecha de Soporte</label>
          <div class= 'col-md-8'>
            <div class="input-group">
              <input id="datepicker-autoclose" type="text" class="form-control mydatepiker required" name="fecha_soporte" placeholder="DD/MM/AAAA">
              <div class="input-group-append">
                <span class="input-group-text h-100">
                  <i class="fa fa-calendar"></i>
                </span>
              </div>
            </div>
          </div>
        </div> 
        <br>   

        <div class="form-group row">
          <label for="cliente" class="col-sm-2 text-end control-label col-form-label">Cliente</label>
          <div class= 'col-md-8'>
            <select class="form-control" id="cliente" name="cliente">
              <option>SELECCIONAR</option>
                @foreach ($clientes as $cliente)
                  <option value={{$cliente->id}}>{{$cliente->nombre}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <br>
        
        <div class="form-group row">
          <label for="localidad" class="col-sm-2 text-end control-label col-form-label">Localidad</label>
          <div class= 'col-md-8'>
            <select class="form-control" id="localidad" name="localidad">
              <option>SELECCIONAR</option>
              @foreach ($localidades as $localidad)
                <option value={{$localidad->id}}>{{$localidad->nombre}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="sistema" class="col-sm-2 text-end control-label col-form-label">Sistema</label>
          <div class= 'col-md-8'>
            <select class="form-control" id="sistema" name="sistema">
              <option>SELECCIONAR</option>
                @foreach ($sistemas as $sistema)
                  <option value={{$sistema->id}}>{{$sistema->nombre}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="so" class="col-sm-2 text-end control-label col-form-label">Sistema Operativo</label>
          <div class= 'col-md-8'>
            <select class="form-control" id="so" name="so">
              <option>SELECCIONAR</option>
                @foreach ($sos as $so)
                  <option value={{$so->id}}>{{$so->nombre}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="incidencia" class="col-sm-2 text-end control-label col-form-label">Incidencia</label>
          <div class= 'col-md-8'>
            <select class="form-control" id="incidencia" name="incidencia">
              <option>SELECCIONAR</option>
                @foreach ($incidencias as $incidencia)
                  <option value="{{$incidencia->id}}" data-sistema="{{$incidencia->sistema_id}}">{{$incidencia->nombre}}</option>
                  <!--<option value={ {$incidencia->id}}>{ {$incidencia->nombre}}</option>-->
                @endforeach
            </select>
          </div>
        </div>
        <br>
      </div>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
</div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset("assets/libs/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset("assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
<!--Wave Effects -->
<script src="{{asset("assets/js/waves.js")}}"></script>

<script src="{{asset("assets/js/jquery.ui.touch-punch-improved.js")}}"></script>
<script src="{{asset("assets/js/jquery-ui.min.js")}}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>-->
<script src="{{asset("assets/libs/timepicker/js/jquery-ui-timepicker-addon.min.js")}}"></script>
<!--<script src="{{asset("assets/libs/timepicker/js/es.js")}}"></script>-->

<script>
  $(function(){
    $('form').submit(function(){
      $(':submit').attr('disabled', 'disabled');
    })
  });
</script>
<script>
  $(document).ready(function() {
    jQuery.datetimepicker.setLocale('es');
    $('#datepicker-autoclose').datetimepicker({
      theme: 'dark',
      language: 'es',
      format: 'd-m-Y H:i', // Formato de fecha y hora deseado
      step: 15, // Intervalo de minutos
      /*allowTimes: [
        '08:00', '08:15', '08:30', '08:45',
        '09:00', '09:15', '09:30', '09:45',
        // Agrega más horas según tus necesidades
      ],*/
    });
  });
</script>

<script>
  $(document).ready(function () {
    // Obtén los elementos select de sistema e incidencia
    const $sistema = $('#sistema');
    const $incidencia = $('#incidencia');

    // Agrega un evento change al select de sistema
    $sistema.on('change', function () {
      const SistemaId = $sistema.val();

      // Oculta todas las opciones de incidencia
      $incidencia.find('option').hide();

      // Muestra solo las opciones de incidencia relacionadas con el sistema seleccionado
      $incidencia.find(`option[data-sistema="${SistemaId}"], option[data-sistema="0"]`).show();
    });
    // Dispara el evento change inicialmente para configurar las opciones de incidencia
    $sistema.trigger('change');
  });
</script>
@endsection