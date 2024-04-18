@extends('home')
@section('content')
  <link rel="stylesheet" href="{{asset("assets/libs/bootstrap-datepicker/dist/css/jquery.datetimepicker.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/extra-libs/DataTables/css/dataTables.bootstrap4.css")}}"/>
  <link rel="stylesheet" href="{{asset("assets/libs/bootstrap/dist/css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/libs/select2/dist/css/select2.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/style.min.css")}}">
  <ul class="nav nav-pills p-3 bg-white mb-3 align-items-center">
    <li class="nav-item">
      <button onclick="support_fields({{ json_encode(['clientes' => $clientes, 'localidades' => $localidades, 'sistemas' => $sistemas, 'sos' => $sos, 'incidencias' => $incidencias, 'users' => $users, 'estatus' => $estatus]) }});"  class="btn nav-link rounded-pill note-link d-flex bg-secondary align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2">
        <i data-feather="edit" class="feather-sm fill-white me-0 me-md-1"></i>
        <span class="d-none d-md-block font-weight-medium">Agregar</span>
      </button>
      <!--<a data-repeater-create="" class="btn nav-link rounded-pill note-link d-flex bg-secondary align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2" id="note-important">
      </a>-->
    </li>
    <li class="nav-item">
      <a class="nav-link rounded-pill note-link d-flex bg-success align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2" id="all-category" data-bs-toggle="modal" data-bs-target="#Importar">
        <i data-feather="list" class="feather-sm fill-white me-0 me-md-1"></i>
        <span class="d-none d-md-block font-weight-medium">Cargar</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link rounded-pill note-link d-flex bg-danger align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2" id="note-business">
        <i data-feather="trash" class="feather-sm fill-white me-0 me-md-1"></i>
        <span class="d-none d-md-block font-weight-medium">Limpiar</span>
      </a>
    </li>
    <!--<li>
      <a class="nav-link rounded-pill note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2" id="note-social">
        <i data-feather="share-2" class="feather-sm fill-white me-0 me-md-1"></i>
        <span class="d-none d-md-block font-weight-medium">Social</span>
      </a>
      </li>-->
    <li class="nav-item ms-auto">
      <a class="btn btn-primary rounded-pill d-flex align-items-center px-3" id="add-notes" href="https://docs.google.com/spreadsheets/d/1sVXCKz5CAFtllH5eu2XxbUr_ndwfGxc1/edit?usp=drive_web&ouid=113407309667452284861&rtpof=true" target="_blank">
        <i data-feather="layout" class="feather-sm fill-white me-0 me-md-1"></i>
        <span class="d-none d-md-block font-weight-medium fs-3">Layout</span>
      </a>
    </li>
  </ul>

  <!-- --------------------- Formulario ---------------- -->
  <div class="card">
    <div class="border-bottom title-part-padding">
      <h4 class="card-title mb-0">Soportes</h4>
    </div>
    <div class="card-body row">
      <form method="POST" action={{ route('RM') }}>
        @csrf
        <div id="support_fields" class="mt-4">
        </div>
        <div class="mt-3 pt-3 border-top">
          <button id="Guardar" type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
            <div class="d-flex align-items-center">
              Guardar
            </div>
          </button>
        </div>
      </form>
    </div>
  </div>
  <!-- ---------------------
                end Full Form Repeater
            ---------------- -->

  <!--<div class="card">
    <div class="card-head">
      <div class="row">
        <a href="">Adjuntar archivo</a>
        <a href="">Datos de archivo</a>
        <a href="">Validar</a>
      </div>
    </div>
  </div>-->
  <style>

    /* Estilos personalizados para el campo "Solicitante" */
    #SolicitanteDiv {
      margin-bottom: 1rem; /* Igual al margen inferior de los otros campos */
    }

    .select2-container {
      width: 100% !important; /* Ajusta el ancho al 100% del contenedor */
    }
  </style>
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

<!--This page JavaScript -->
<script src="{{asset("assets/libs/jquery.repeater/jquery.repeater.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/repeater-init.js")}}"></script>

<script>
  $(document).ready(function() {
    
    // Recupera las variables de Laravel directamente desde la vista
    var clientes = @json($clientes);
    var estatus = @json($estatus);
    var localidades = @json($localidades);
    var sistemas = @json($sistemas);
    var sos = @json($sos);
    var incidencias = @json($incidencias);
    var users = @json($users);
    var tickets = @json($tickets);
     // Llamada a la función initializeSupportForm al cargar la página
     initializeSupportForm({
        clientes: clientes,
        estatus: estatus,
        localidades: localidades,
        sistemas: sistemas,
        sos: sos,
        incidencias: incidencias,
        users: users,
        tickets: tickets
    });


    // Función para inicializar el formulario de soporte
    function initializeSupportForm(data) {
      support_data(data);
    }

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

    // Configuración para deshabilitar botón de submit al enviar el formulario
    $('form').submit(function() {
      $(':submit').attr('disabled', 'disabled');
    });

    // Configuración de opciones de sistema e incidencia
    const $sistema = $('#sistema');
    const $incidencia = $('#incidencia');

    $sistema.on('change', function() {
      const SistemaId = $sistema.val();
      $incidencia.find('option').hide();
      $incidencia.find(`option[data-sistema="${SistemaId}"], option[data-sistema="0"]`).show();
    });

    $sistema.trigger('change');

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
  
// Configuración del datetimepicker
  $(document).ready(function() {
    jQuery.datetimepicker.setLocale('es');
    $('.mydatepicker').datetimepicker({
      theme: 'dark',
      language: 'es',
      format: 'd-m-Y H:i',
      step: 15,
    });
    });
</script>
<script>
  $(document).ready(function() {
  $('#note-business').click(function(e) {
    <?php session()->put('tickets', NULL); ?>
    window.location.href = "{{ route('CM') }}";
  });
});
</script>

@endsection
