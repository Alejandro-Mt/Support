@extends('home')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap-datepicker/dist/css/jquery.datetimepicker.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/extra-libs/DataTables/css/dataTables.bootstrap4.css")}}"/>
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap/dist/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/libs/select2/dist/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/style.min.css")}}">
@section('content')

  <h1>Seguimiento</h1>
  <div class="row">
    <div class="col-lg-6 d-flex align-items-stretch">
      <form method="POST" action={{ route('Seg_Sop',$ticket->folio) }}>
        {{ csrf_field() }}
        <div class="card">
          <div class="card-head m-3">
            <h4>DATOS DE SOPORTE</h4>
            <h5>*Campos obligatorios</h5> 
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="datepicker-autoclose" class="col-sm-12 text-end control-label col-form-label">Fecha de Seguimiento*</label>
              <div class= 'col-md-12'>
                <div class="input-group">
                  <input id="datepicker-autoclose" type="text" class="form-control mydatepiker @error ('fecha_soporte') is-invalid @enderror" required autofocus {{ $ticket->id_estatus == 5 ? 'disabled' : '' }} name="fecha_soporte" placeholder="DD/MM/AAAA  HH:mm" autocomplete='off'>
                  <div class="input-group-append">
                    <span class="input-group-text h-100">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </div>
                  @error('fecha_soporte')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>    

            <div class="form-group row">
              <label for="cliente" class="col-sm-12 text-end control-label col-form-label">Cliente*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('cliente') is-invalid @enderror" required autofocus id="cliente" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} name="cliente" >
                  <option value={{$ticket->id_cliente}}>{{$ticket->cliente->nombre}}</option>
                    @foreach ($clientes as $cliente)
                      <option value={{$cliente->id_cliente}}>{{$cliente->nombre}}</option>
                    @endforeach
                </select>
                @error('cliente')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            
            <div class="form-group row">
              <label for="localidad" class="col-sm-12 text-end control-label col-form-label">Localidad*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('localidad') is-invalid @enderror" required autofocus id="localidad" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} name="localidad">
                  <option value={{$ticket->id_localidad}}>{{$ticket->localidad->nombre}}</option>
                  @foreach ($localidades as $localidad)
                    <option value={{$localidad->id_localidad}}>{{$localidad->nombre}}</option>
                  @endforeach
                </select>
                @error('localidad')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="sistema" class="col-sm-12 text-end control-label col-form-label">Sistema*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('sistema') is-invalid @enderror" required autofocus id="sistema" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} name="sistema">
                  <option value={{$ticket->id_sistema}}>{{$ticket->sistema->nombre}}</option>
                    @foreach ($sistemas as $sistema)
                      <option value={{$sistema->id_sistema}}>{{$sistema->nombre}}</option>
                    @endforeach
                </select>
                @error('sistema')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="so" class="col-sm-12 text-end control-label col-form-label">Sistema Operativo*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('so') is-invalid @enderror" required autofocus id="so" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} name="so">
                  <option value={{$ticket->id_so}}>{{ $ticket->so ? $ticket->so->nombre : 'SELECCIONAR' }}</option>
                    @foreach ($sos as $so)
                      <option value={{$so->id_so}}>{{$so->nombre}}</option>
                    @endforeach
                </select>
                @error('so')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="incidencia" class="col-sm-12 text-end control-label col-form-label">Incidencia*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('incidencia') is-invalid @enderror" required autofocus id="incidencia" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} name="incidencia">
                  <option value={{$ticket->id_incidencia}}>{{ $ticket->incidencia ? $ticket->incidencia->nombre : 'SELECCIONAR' }}</option>
                    @foreach ($incidencias as $incidencia)
                      <option value="{{$incidencia->id_incidencia}}" data-sistema="{{$incidencia->id_sistema}}">{{$incidencia->nombre}}</option>
                    @endforeach
                </select>
                @error('incidencia')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
  
            <div class="form-group row">
              <label for="id_cc" class="col-sm-12 text-end control-label col-form-label">Responsable CC*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('id_cc') is-invalid @enderror" id="id_cc" name="id_cc" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }}>
                  <option value={{$ticket->id_cc}}>{{ $ticket->rCC ? $ticket->rCC->nombreCompleto() : 'SELECCIONAR' }}</option>
                  @foreach ($cc as $user)
                    <option value={{$user->id_user}}>{{$user->user->nombreCompleto()}}</option>
                  @endforeach
                </select>
                @error('id_cc')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          
            <div class="form-group row" id="campo_id_pip">
              <label for="id_pip" class="col-sm-12 text-end control-label col-form-label">Responsable PIP*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('id_pip') is-invalid @enderror" required autofocus id="id_pip" name="id_pip">
                  <option value={{$ticket->id_pip}}>{{ $ticket->rPIP ? $ticket->rPIP->nombreCompleto() : 'SELECCIONAR' }}</option>
                  @foreach ($pip as $userpip)
                    <option value={{$userpip->id_user}}>{{$userpip->user->nombreCompleto()}}</option>
                  @endforeach
                </select>
                @error('id_pip')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row" id="campo_id_op">
              <label for="id_op" class="col-sm-12 text-end control-label col-form-label">Responsable Operaciones*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('id_op') is-invalid @enderror" id="id_op" name="id_op" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }}>
                  <option value={{$ticket->id_op}}>{{ $ticket->rOP ? $ticket->rOp->nombreCompleto() : 'SELECCIONAR' }}</option>
                  @foreach ($ops as $op)
                    <option value={{$op->id_user}}>{{$op->user->nombreCompleto()}}</option>
                  @endforeach
                </select>
                @error('id_op')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row" id="campo_id_arq">
              <label for="id_arq" class="col-sm-12 text-end control-label col-form-label">Responsable Desarrollo*</label>
              <div class= 'col-md-12'>
                <select class="form-control @error ('id_arq') is-invalid @enderror" id="id_arq" name="id_arq" {{ $ticket->id_estatus == 5 || Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }}>
                  <option value={{$ticket->id_arq}}>{{ $ticket->rAR ? $ticket->rAR->nombreCompleto() : 'SELECCIONAR' }}</option>
                  @foreach ($arq as $des)
                    <option value={{$des->id_user}}>{{$des->user->nombreCompleto()}}</option>
                  @endforeach
                </select>
                @error('id_arq')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            
            <div class="form-group row">
              <label for="Comentario" class="col-sm-12 text-end control-label col-form-label">Comentarios</label>
              <div class="col-md-12">
                <textarea type="text" class="form-control @error('comentario') is-invalid @enderror" required autofocus id="Comentario"  {{ $ticket->id_estatus == 5 ? 'disabled' : '' }} name="comentario" rows="1" placeholder="Hasta 250 caracteres"></textarea>
                <small class="text-muted" id="charCount">0/250 caracteres</small>
                @error('comentario')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div class=" card-feet">
            <div class="form-group row justify-content-center @if(Auth::user()->usrdata->rol->id_rol == 3) d-none @endif">
              <div class="col-md-10">
                @foreach($estatus as $estado)
                <div class="form-check">
                  <input id="id_estatus" type="radio" class="form-check-input" {{ $ticket->id_estatus == 5 ? 'disabled' : '' }} name="estatus" value="{{$estado->id_estatus}}" {{ $ticket->id_estatus == $estado->id_estatus ? 'checked' : '' }}>
                  <label for="id_estatus" class="form-check-label">{{$estado->nombre}}</label>
                </div>
                @endforeach
              </div>
            </div>
            <input type="hidden" name="origen" value="Formulario">
            <div class="text-center">
              <button type="submit" {{ $ticket->id_estatus == 5 ? 'disabled' : '' }} class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card col-lg-12">
          <div class="card-head m-3">
            <h4>Comentarios</h4>
          </div>
          <div class="card-body">
            <div class="form-group row">
              @foreach($ticket->allComentarios as $comentario)
                @include('soporte.comentario')
              @endforeach
            </div>
          </div>
          <div class=" card-feet">
          </div>
        </div>
    </div>
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

<script src="{{asset("assets/libs/select2/dist/js/select2.full.min.js")}}"></script>

<script>
  $(function(){
    $('form').submit(function(){
      $(':submit').attr('disabled', 'disabled');
    })
  });

  $(document).ready(function() {
    jQuery.datetimepicker.setLocale('es');
    $('#datepicker-autoclose').datetimepicker({
      theme: 'dark',
      language: 'es',
      format: 'd-m-Y H:i', // Formato de fecha y hora deseado
      step: 15, // Intervalo de minutos
    });
    
    function mostrarOcultarCampos() {
      var idEstatus = $('input[name="estatus"]:checked').val();

      // Ocultar ambos campos por defecto
      $('#campo_id_arq, #campo_id_op, #campo_id_pip').hide();
      
      // Eliminar el atributo required de los campos ocultos
      $('#id_arq, #id_op, #id_pip').removeAttr('required');

      // Mostrar campo ID_OP si el ID_ESTATUS es 3
      if (idEstatus == 2) {
        $('#campo_id_pip').show();
        $('#id_pip').attr('required', 'required');
      }

      // Mostrar campo ID_OP si el ID_ESTATUS es 3
      if (idEstatus == 3) {
        $('#campo_id_op').show();
        $('#id_op').attr('required', 'required');
      }

      // Mostrar campo ID_ARQ si el ID_ESTATUS es 4
      if (idEstatus == 4) {
        $('#campo_id_arq').show();
        $('#id_arq').attr('required', 'required');
      }
    }

    // Llama a la función al cargar la página
    mostrarOcultarCampos();

      // Configura un evento change para detectar cambios en el estado
    $('input[name="estatus"]').change(function () {
      mostrarOcultarCampos();
    });
  });

  // Configuración para el contador de caracteres
  var maxLength = 250;
    $('#Comentario').keyup(function() {
      var length = $(this).val().length;
      var remainingChars = maxLength - length;
      $('#charCount').text(length + '/' + maxLength + ' caracteres');
      
      // Cambiar el color a rojo si se alcanza el límite
      if (length >= maxLength) {
        $('#charCount').removeClass('text-muted').addClass('text-danger');
        // Si deseas deshabilitar la entrada después de alcanzar el límite, puedes usar:
        $(this).attr('maxlength', length);
      } else {
        // Restaurar el color predeterminado si no se alcanza el límite
        $('#charCount').removeClass('text-danger').addClass('text-muted'); // Color predeterminado de texto
      }
    });
  /*
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
  });*/
</script>
@endsection