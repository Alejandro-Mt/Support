<!-- Evidencia -->
<div class="modal" id="Adjuntos" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title">
          <strong>Registro masivo de soportes</strong>
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <a></a>
        <form  class="dropzone" action="{{route('Documentacion',$ticket->folio)}}" method="post" enctype="multipart/form-data" id="myAwesomeDropzone">
          {{ csrf_field() }}
        </form> 
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect waves-light text-white" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Incluir complemento -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset("assets/libs/dropzone/dist/min/dropzone.min.css")}}"/>
<script src="{{asset("assets/libs/dropzone/dist/min/dropzone.min.js")}}"></script>
<script>
  var maxFiles = 1;
  Dropzone.options.myAwesomeDropzone = {
    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
    paramName: "adjunto", // Las imágenes se van a usar bajo este nombre de parámetro
    maxFilesize: 150, // Tamaño máximo en MB
    maxFiles: maxFiles,
    addRemoveLinks: true,
    dictRemoveFile: "Cambiar archivo",
    /*accept: function (file, done) {
      },*/
    removedfile: function (file) {
      var name = file.name;
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        type: 'DELETE',
        url: "file.borrar." + name,
      });
      var _ref;
      return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function (file, response) {
      if (response && response.success) {
        window.location.reload(); 
      } else {
        console.log("No se recibió un fileId válido en la respuesta.");
      }
    },
  };
</script>
  