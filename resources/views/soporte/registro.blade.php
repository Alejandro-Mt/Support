@extends('home')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap-datepicker/dist/css/jquery.datetimepicker.min.css")}}">
<!--<link rel="stylesheet" ref="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">-->
<link rel="stylesheet" href="{{asset("assets/extra-libs/DataTables/css/dataTables.bootstrap4.css")}}"/>
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap/dist/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/libs/select2/dist/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/style.min.css")}}">
@section('content')

<div class="container">
  <h1>Soporte</h1>
  <form method="POST" action={{ route('Reg_Sop') }}>
    {{ csrf_field() }}
    <div class="card {{ Auth::user()->usrdata->id_rol == 3 ? 'd-none' : '' }}"">
      <div class="card-head m-3">
        <h4>DATOS DE QUIEN REPORTA</h4>
        <h5>*Campos obligatorios</h5> 
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="email" class="col-sm-2 text-end control-label col-form-label">e-mail*</label>
          <div class= 'col-md-8'>
            <select class="form-control select2" {{ Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} id="email" name="email">
              <option value={{Auth::user()->email}}>{{Auth::user()->email}}</option>
              @foreach ($users as $user)
                <option value="{{$user->email}}">{{$user->email}}</option>
              @endforeach
            </select>  
            <!--<input type="text" class="form-control" id="noEmail" name="email"> -->        
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="nombre" class="col-sm-2 text-end control-label col-form-label">Nombre*</label>
          <div class= 'col-md-8'>
            <input type="text" class="form-control @error ('nombre_prom') is-invalid @enderror" required autofocus id="nombre" name="nombre_prom" {{ Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} placeholder="Nombre(s)" value="{{old('nombre_prom')}}">
            @error('nombre_prom')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="a_pat" class="col-sm-2 text-end control-label col-form-label">Apellido Paterno*</label>
          <div class= 'col-md-8'>
            <input type="text" class="form-control @error ('a_pat') is-invalid @enderror" required autofocus id="a_pat" name="a_pat" placeholder="Paterno" {{ Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} value="{{old('a_pat')}}">
            @error('a_pat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="a_mat" class="col-sm-2 text-end control-label col-form-label">Apellido Materno*</label>
          <div class= 'col-md-8'>
            <input type="text" class="form-control @error ('a_mat') is-invalid @enderror" required autofocus id="a_mat" name="a_mat" placeholder="Materno" {{ Auth::user()->usrdata->id_rol == 3 ? 'disabled' : '' }} value="{{old('a_mat')}}">
            @error('a_mat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="movil" class="col-sm-2 text-end control-label col-form-label">Teléfono Móvil</label>
          <div class= 'col-md-8'>
            <input type="number" class="form-control @error ('movil') is-invalid @enderror" id="movil" name="movil" placeholder="55 1234 5678" pattern="[0-9]{1,10}" maxlength="10" value="{{old('movil')}}">
            @error('movil')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-head m-3">
        <h4>DATOS DE SOPORTE</h4>
        <h5>*Campos obligatorios</h5> 
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="cliente" class="col-sm-2 text-end control-label col-form-label">Cliente*</label>
          <div class= 'col-md-8'>
            <select class="form-control @error ('cliente') is-invalid @enderror" required autofocus id="cliente" name="cliente">
              <option value={{NULL}}>SELECCIONAR</option>
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
        <br>
        
        <div class="form-group row">
          <label for="localidad" class="col-sm-2 text-end control-label col-form-label">Localidad*</label>
          <div class= 'col-md-8'>
            <select class="form-control @error ('localidad') is-invalid @enderror" required autofocus id="localidad" name="localidad">
              <option value={{NULL}}>SELECCIONAR</option>
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
        <br>

        <div class="form-group row">
          <label for="sistema" class="col-sm-2 text-end control-label col-form-label">Sistema*</label>
          <div class= 'col-md-8'>
            <select class="form-control @error ('sistema') is-invalid @enderror" required autofocus id="sistema" name="sistema">
              <option value={{NULL}}>SELECCIONAR</option>
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
        <br>
        <div class="form-group row">
          <label for="Comentario" class="col-sm-2 text-end control-label col-form-label">Comentarios*</label>
          <div class="col-md-8">
            <textarea type="text" class="form-control @error('comentario') is-invalid @enderror" required autofocus id="Comentario" name="comentario" placeholder="Hasta 250 caracteres"></textarea>
            <small class="text-muted" id="charCount">0/250 caracteres</small>
            @error('comentario')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <br>
        @if(Auth::user()->usrdata->id_rol != 3)
          <div class="form-group row">
            <label for="datepicker-autoclose" class="col-sm-2 text-end control-label col-form-label">Fecha de Soporte*</label>
            <div class= 'col-md-8'>
              <div class="input-group">
                <input id="datepicker-autoclose" type="text" class="form-control mydatepiker @error ('fecha_soporte') is-invalid @enderror" required autofocus name="fecha_soporte" placeholder="DD/MM/AAAA" value="{{old('fecha_soporte')}}" autocomplete='off'>
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
          <br> 

          <div class="form-group row">
            <label for="so" class="col-sm-2 text-end control-label col-form-label">Sistema Operativo*</label>
            <div class= 'col-md-8'>
              <select class="form-control @error ('so') is-invalid @enderror" required autofocus id="so" name="so">
                <option value={{NULL}}>SELECCIONAR</option>
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
          <br>

          <div class="form-group row">
            <label for="incidencia" class="col-sm-2 text-end control-label col-form-label">Incidencia*</label>
            <div class= 'col-md-8'>
              <select class="form-control @error ('incidencia') is-invalid @enderror" required autofocus id="incidencia" name="incidencia">
                <option value={{NULL}}>SELECCIONAR</option>
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
          <br>  

          <div class="form-group row">
            <label for="id_cc" class="col-sm-2 text-end control-label col-form-label">Responsable CC*</label>
            <div class= 'col-md-8'>
              <select class="form-control @error ('id_cc') is-invalid @enderror" id="id_cc" name="id_cc">
                <option value={{NULL}}>SELECCIONAR</option>
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
          <br>
          
          <div class="form-group row" id="campo_id_pip">
            <label for="id_pip" class="col-sm-2 text-end control-label col-form-label">Responsable PIP*</label>
            <div class= 'col-md-8'>
              <select class="form-control @error ('id_pip') is-invalid @enderror" required autofocus id="id_pip" name="id_pip">
                <option value={{NULL}}>SELECCIONAR</option>
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
            <label for="id_op" class="col-sm-2 text-end control-label col-form-label">Responsable Operaciones</label>
            <div class= 'col-md-8'>
              <select class="form-control @error ('id_op') is-invalid @enderror" id="id_op" name="id_op">
                <option value={{NULL}}>SELECCIONAR</option>
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
            <label for="id_arq" class="col-sm-2 text-end control-label col-form-label">Responsable Desarrollo</label>
            <div class= 'col-md-8'>
              <select class="form-control @error ('id_arq') is-invalid @enderror" id="id_arq" name="id_arq">
                <option value={{NULL}}>SELECCIONAR</option>
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
        @endif
      </div>
      <div class=" card-feet">
        <div class="form-group row justify-content-center @if(Auth::user()->usrdata->rol->id_rol == 3) d-none @endif">
          <div class="col-md-10">
            @foreach($estatus as $estado)
              <input type="radio" class="form-check-input" name="estatus" value="{{$estado->id_estatus}}" {{ old('estatus', $estado->id_estatus) == 'resuelto' ? 'checked' : ($estado->id_estatus == 1 ? 'checked' : '') }}> {{$estado->nombre}}
            @endforeach
          </div>     
        </div>
        <br>
      </div>
    </div>
    <input type="hidden" name="origen" value="Formulario">
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
<script src="{{asset("assets/libs/timepicker/js/jquery-ui-timepicker-addon.min.js")}}"></script>

<script src="{{asset("assets/libs/select2/dist/js/select2.full.min.js")}}"></script>

<script>
  $(document).ready(function() {
    // Configuración inicial de Select2
    $('.select2').select2({
      tags: true,
      tokenSeparators: [',', ' '],
      createTag: function(params) {
        return {
          id: params.term,
          text: params.term,
          newOption: true
        };
      }
    }).on('change', function() {
      var selectedEmail = $(this).val();
      $('#noEmail').val(selectedEmail);
    });

    // Evento change para el campo de correo electrónico
    $('#email').change(function() {
      var selectedEmail = $(this).val();
      if (selectedEmail === "") {
        $('#noEmail').prop('disabled', false).focus();
      } else {
        $('#noEmail').prop('disabled', true);
      }

      // Obtener información del usuario si el correo ya está seleccionado
      if (selectedEmail !== "") {
        var users = {!! json_encode($users) !!};
        var encontrado = false;

        $.each(users, function(index, user) {
          if (user.email == selectedEmail) {
            encontrado = true;
            $('#noEmail').val(user.email);
            $('#nombre').val(user.nombre);
            $('#a_pat').val(user.a_pat);
            $('#a_mat').val(user.a_mat);
            $('#movil').val(user.movil);
            return false;
          }
        });

        if (!encontrado) {
          $('#nombre').val('');
          $('#a_pat').val('');
          $('#a_mat').val('');
          $('#movil').val('');
        }
      }
    });

    // Evento input para el campo 'noEmail'
    $('#noEmail').on('input', function() {
      var userInput = $(this).val();
      $('.select2').val(userInput).trigger('change');
    });

    // Configuración para deshabilitar botón de submit al enviar el formulario
    $(function() {
      $('form').submit(function() {
        $(':submit').attr('disabled', 'disabled');
      });
    });

    // Configuración del datetimepicker
    $(function() {
      jQuery.datetimepicker.setLocale('es');
      $('#datepicker-autoclose').datetimepicker({
        theme: 'dark',
        language: 'es',
        format: 'd-m-Y H:i',
        step: 15,
      });
    });

    // Configuración de opciones de sistema e incidencia
    $(document).ready(function() {
      const $sistema = $('#sistema');
      const $incidencia = $('#incidencia');

      $sistema.on('change', function() {
        const SistemaId = $sistema.val();
        $incidencia.find('option').hide();
        $incidencia.find(`option[data-sistema="${SistemaId}"], option[data-sistema="0"]`).show();
      });

      $sistema.trigger('change');
    });

    // Obtener el valor inicial del campo de correo electrónico
    var selectedEmail = $('#email').val();

    // Verificar si el correo electrónico inicial ya está seleccionado
    if (selectedEmail !== "") {
      $('#noEmail').prop('disabled', true);

      var users = {!! json_encode($users) !!};
      var encontrado = false;

      $.each(users, function(index, user) {
        if (user.email == selectedEmail) {
          encontrado = true;
          $('#noEmail').val(user.email);
          $('#nombre').val(user.nombre);
          $('#a_pat').val(user.a_pat);
          $('#a_mat').val(user.a_mat);
          $('#movil').val(user.movil);
          return false;
        }
      });

      if (!encontrado) {
        $('#nombre').val('');
        $('#a_pat').val('');
        $('#a_mat').val('');
        $('#movil').val('');
      }
    }

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
  });

  function mostrarOcultarCampos() {
    var idEstatus = $('input[name="estatus"]:checked').val();

    // Ocultar campos que no tienen valor
    if (!$('#id_arq').val()) {
        $('#campo_id_arq').hide();
        $('#id_arq').removeAttr('required');
    }
    if (!$('#id_op').val()) {
        $('#campo_id_op').hide();
        $('#id_op').removeAttr('required');
    }
    if (!$('#id_pip').val()) {
        $('#campo_id_pip').hide();
        $('#id_pip').removeAttr('required');
    }

    // Mostrar campo ID_PIP si el ID_ESTATUS es 2
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
  // VAlidacion de rol para verificacion de CC
  $(document).ready(function() {
    // Verifica si el rol del usuario es 1
    const userRole = {{ Auth::user()->usrdata->id_rol }};
    const selectElement = $('#id_cc');
    const respPip = $('#id_pip');

    if (userRole === 1) {
      selectElement.attr('required', 'required');
    } 
    if (userRole === 2 || userRole === 4){
      respPip.attr('required', 'required');
      $('#campo_id_pip').show();
    }
  });
</script>


@endsection