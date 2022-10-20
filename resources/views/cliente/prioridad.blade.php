@extends('layouts.app')
@section('content')

<!-- Incluir complemento -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset("assets/extra-libs/prism/prism.css")}}"/>
<link rel="stylesheet" type="text/css" href="{{asset("assets/libs/dragula/dist/dragula.min.css")}}"/>
<div class="row">
  <div class="col-lg-4">
    <div class="row">
      <div class="card">
        <div class="card-header d-flex bg-warning">
          <h4 class="mb-0 text-white">Pendientes</h4>
          <a class="btn btn-success btn-sm ml-auto text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Solicitar Ajuste de prioridades
          </a>
        </div>
        <div class="card-body">
          <div class="row draggable-cards" id="card-colors">
            @if ($validar == 0)
                  @foreach($pendientes as $pendiente)
              <div class="col-md-12 col-sm-12" id="{{$pendiente->folio}}" >
                <div class="d-none" id="{{$pendiente->id_cliente}}"></div>
                <!-- ---------------------start Special title treatment---------------- -->
                <div class="card card-hover">
                  <div class="card-header">
                    <h5 class="mb-0 text-dark">{{$pendiente->folio}}</h5>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title">{{$pendiente->descripcion}}</h6>
                    <p class="card-text">
                      {{$pendiente->nombre_s}}
                    </p>
                    <a href={{route('Documentos',$pendiente->folio)}} class="btn btn-light-primary text-primary">Documentacion</a>
                  </div>
                </div>
                <!-- --------------------- end Special title treatment ---------------- -->
              </div>
                  @endforeach
            @else
              @foreach ($orden as $folio)
                @for ($i = 0; $i < count(explode( ',', str_replace(' ', '', $folio->orden ))); $i++)
                  <div class="col-md-12 col-sm-12" id="{{explode( ',', str_replace(' ', '', $folio->orden ))[$i]}}" >
                    <div class="d-none" id="{{$folio->id_cliente}}"></div>
                    <!-- ---------------------start Special title treatment---------------- -->
                    <div class="card card-hover">
                      <div class="card-header">
                        <h5 class="mb-0 text-dark">{{explode( ',', str_replace(' ', '', $folio->orden ))[$i]}}</h5>
                      </div>
                      <div class="card-body">
                        @foreach($pendientes as $pendiente)
                          @if (explode( ',', str_replace(' ', '', $folio->orden ))[$i] == $pendiente->folio)
                            <h6 class="card-title">{{$pendiente->descripcion}}</h6>
                            <p class="card-text">
                              {{$pendiente->nombre_s}}
                            </p>
                            <a href={{route('Documentos',$pendiente->folio)}} class="btn btn-light-primary text-primary">Documentacion</a>
                          @endif
                        @endforeach
                      </div>
                    </div>
                    <!-- ---------------------
                                      end Special title treatment
                                  ---------------- -->
                  </div>
                @endfor
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card">
      <div class="card-header bg-danger">
        <h4 class="mb-0 text-white">Pospuestos</h4>
      </div>
      <div class="card-body">
        <div class="row draggable-cards" id="draggable-area">
          @foreach ($pospuestos as $pospuesto)
            <div class="col-md-12 col-sm-12">
              <!-- ---------------------
                                start Special title treatment
                            ---------------- -->
              <div class="card card-hover">
                <div class="card-header">
                  <h5 class="mb-0 text-dark">{{$pospuesto->folio}}</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">{{$pospuesto->descripcion}}</h6>
                  <p class="card-text">
                    {{$pospuesto->nombre_s}}
                  </p>
                  <a href={{route('Documentos',$pospuesto->folio)}} class="btn btn-light-primary text-primary">Documentacion</a>
                </div>
              </div>
              <!-- ---------------------
                                end Special title treatment
                            ---------------- -->
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card">
      <div class="card-header bg-success">
        <h4 class="mb-0 text-white">Implementados</h4>
      </div>
      <div class="card-body">
        <div class="row draggable-cards" id="draggable-area">
          @foreach ($implementados as $implementado)
            <div class="col-md-12 col-sm-12">
              <!-- ---------------------
                                start Special title treatment
                            ---------------- -->
              <div class="card card-hover">
                <div class="card-header">
                  <h5 class="mb-0 text-dark">{{$implementado->folio}}</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">{{$implementado->descripcion}}</h6>
                  <p class="card-text">
                    {{$implementado->nombre_s}}
                  </p>
                  <a href={{route('Documentos',$implementado->folio)}} class="btn btn-light-primary text-primary">Documentacion</a>
                </div>
              </div>
              <!-- ---------------------
                                end Special title treatment
                            ---------------- -->
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h4 class="modal-title" id="myLargeModalLabel">
            Solicitar ajuste a prioridades
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <p>
            Si se autoriza enviar los datos, se debera esperar a que un coordinador autorice los ajustes
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button id="solicitar" type="button" class="btn btn-success" data-bs-dismiss="modal">Enviar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .card-body{
    overflow-y: auto;
    max-height: 500px;
  }
</style>
<script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js'></script>
<script>
  $(document).ready(function () {
    dragula([document.getElementById('draggable-area')]),
      dragula([document.getElementById('card-colors')],
        {
          copy: false,
          copySortSource: true,
        },
      )
        .on('drag', function (e) {
          e.className = e.className.replace('card-moved', '');
        })
        .on('drop', function (e) {
          e.className += ' card-moved';         
        })
        .on('over', function (e, t) {
          t.className += ' card-over';
        })
        .on('out', function (e, t) {
          t.className = t.className.replace('card-over', '');
        }),
      dragula([document.getElementById('copy-left'), document.getElementById('copy-right')], {
        copy: !0,
      }),
      dragula(
        [document.getElementById('left-handles'), document.getElementById('right-handles')],
        {
          moves: function (e, t, n) {
            return n.classList.contains('handle');
            console.log(n.classList.contains('titleArea'));
          },
        },
      ),
      dragula(
        [
          document.getElementById('left-titleHandles'),
          document.getElementById('right-titleHandles'),
        ],
        {
          moves: function (e, t, n) {
            return n.classList.contains('titleArea');
          },
        },
      );
  });
</script>
<script>
  $(document).ready(function () {
    $('#solicitar').on('click', function (){
      var lista = document.getElementById('card-colors');
      var cliente = $('.d-none').attr("id");
      var orden = '';
      for(var i = 0; i<lista.children.length; i++){
        if (i < lista.children.length-1) {
          orden += lista.children[i].id + ',';
        }else{
          orden += lista.children[i].id;
        }
      }
      $.ajax({
          headers: {'X-CSRF-TOKEN' : "{{csrf_token()}}"},
          type: 'POST',
          url: "solicitud.prioridades",
          data: { id_cliente: cliente, orden: orden },
          success: function (response) {
            window.location.href = "prioridad." + cliente;
          }
      });
    }) 

  })
</script>
@endsection