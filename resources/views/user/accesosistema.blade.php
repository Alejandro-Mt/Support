<!-- Modal -->
  <div class="modal fade" id="acceso-s-{{$loop->iteration}}" tabindex="-1" aria-labelledby="scroll-long-inner-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <form action="" method="post">
          <div class="modal-header d-flex align-items-center">
            <h4 class="modal-title" id="myLargeModalLabel">{{$miembro->nombreCompleto()}}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row border mt-3">
                <div class="table-responsive">
                  <li class="list-inline-item">
                    @if($miembro->usrdata->accesosis)
                    @foreach($sistemas as $sistema)
                      @if($miembro->id_user == Auth::user()->id_user)
                      <div class="form-check mr-sm-2">
                        <input type="checkbox" class="form-check-input secondary check-outline outline-secondary" checked value={{$sistema->id_sistema}} disabled>
                        <label class="form-check-label" for="id_sistema">{{$sistema->nombre}}</label>
                      </div>
                      @else
                        <div class="form-check mr-sm-2" id="{{$miembro->id_user}}-{{$sistema->id_sistema}}">
                          <input name="id_sistema" type="checkbox" class="form-check-input secondary check-outline outline-secondary" 
                            @foreach ($miembro->usrdata->accesosis as $acs)
                                @if (($sistema->id_sistema == $acs->id_sistema) && ($miembro->id_user== $acs->id_user))
                                  checked
                                  value="{{$acs->id}}"
                                @endif
                            @endforeach
                            onchange='update("{{$miembro->id_user}}.{{$sistema->id_sistema}}")'
                            id = "{{$miembro->id_user}}.{{$sistema->id_sistema}}">
                          <label class="form-check-label" for="id_sistema">{{$sistema->nombre}}</label>
                        </div>
                      @endif
                    @endforeach
                    @endif
                  </li>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button name="id" value={{$miembro->id_user}} type="button" class="btn btn-light-success text-white font-medium waves-effect text-start" data-bs-dismiss='modal'>
              Hecho
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <style>
    .modal-body {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
    }
  </style>