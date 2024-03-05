@if(Auth::user()->usrdata->rol->nombre == 'ADMINISTRADOR')
  <div class="tab-pane fade" id="Incidencia" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="mb-3">
      <div class="input-group input-group-lg">
        <div class="card-body">
          <div class="no-block align-items-center">
            <div class="row media">
              <div class="col-md-1">
                <div class="mb-3 text-center">ID</div>
              </div>
              <div class="col-md-6">
                <div class="mb-3 text-center">Nombre</div>
              </div>
              <div class="col-md-3">
                <div class="mb-3 text-center">Sistema</div>
              </div>
              <div class="col-md-2 action-btn">
                <div class="mb-3">
                    <a class="edit">
                      <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add-i" class="btn-circle btn btn-outline-success">+</a>
                    </a>
                </div>
              </div>
            </div>
            @foreach ($incidencias as $incidencia)
              <div class="row media">
                <div class="col-md-1">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$incidencia->id_incidencia}}</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$incidencia->nombre}}</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$incidencia->sistema->nombre}}</label>
                  </div>
                </div>
                <div class="col-md-2 action-btn">
                  <div class="mb-3">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-i{{$loop->iteration}}" class="text-dark edit">
                      <i data-feather="eye" class="feather-sm fill-white"></i>
                    </a>
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#borrar-i{{$loop->iteration}}" class="text-danger delete ms-2">
                      <i data-feather="trash-2" class="feather-sm fill-white"></i>
                    </a>
                  </div>
                </div>
              </div>
              <form method="POST" action="{{route ('UIncidencia',$incidencia->id_incidencia)}}" class="mt-5" enctype="multipart/form-data">
                @csrf
                <!-- Modal Editar-->
                <div class="modal" id="edit-i{{$loop->iteration}}">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title">Incidencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="add-incidencia-box">
                          <div class="add-incidencia-content">
                            <form id="addContactModalTitle">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3 incidencia-name">
                                    <label type="text" id="c-name" class="form-control">Incidencia</label>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3 incidencia-name">
                                    <input type="text" name="nombre" class="form-control text-uppercase" value="{{$incidencia->nombre}}"/>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3 inc-sis">
                                    <label type="text" id="i-sis" class="form-control">Sistema</label>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3 inc-sis">
                                    <select class="form-control @error ('sistema') is-invalid @enderror" required autofocus id="sistema" name="sistema">
                                      <option value={{$incidencia->id_sistema}}>{{$incidencia->sistema->nombre}}</option>
                                        @foreach ($sistemas as $sistema)
                                          <option value={{$sistema->id_sistema}}>{{$sistema->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('sistema')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    <!--<input type="text" name="id_sistema" class="form-control text-uppercase" value="{$incidencia->nombre}}"/>-->
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3 incidencia-name">
                                    <label type="text" id="c-name" class="form-control">Estatus</label>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3 incidencia-estatus">
                                    <select class="form-control @error ('activo') is-invalid @enderror" required autofocus id="activo" name="activo">
                                      <option value = 1>Activo</option>
                                      <option value = 0>Inactivo</option>
                                    </select>
                                    <!--<input type="binary" name="activo" class="form-control text-uppercase" value="{{$incidencia->activo}}"/>-->
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button id="btn-edit-3-{{$loop->iteration}}" class="btn btn-success rounded-pill px-4">Guardar</button>
                        <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
              </form>
              <form method="POST" action="{{route ('DIncidencia',$incidencia->id_incidencia)}}" class="mt-5">
                @csrf
                @method('delete')
                <!-- Modal Borrar-->
                <div class="modal" id="borrar-i{{$loop->iteration}}">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title">Borrar incidencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="add-incidencia-box">
                          <div class="add-incidencia-content">
                            <form id="addContactModalTitle">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <span class="validation-text text-danger">¿Esta seguro de eliminar el registro?</span>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button id="btn-edit-4-{{$loop->iteration}}" class="btn btn-success rounded-pill px-4">SI</button>
                        <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
              </form>
            @endforeach
            <form method="POST" action="{{route ('NIncidencia')}}" class="mt-5" enctype="multipart/form-data">
              @csrf
              <!-- Modal Añadir-->
              <div class="modal" id="add-i">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                      <h5 class="modal-title">Nuevo incidencia</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="add-incidencia-box">
                        <div class="add-incidencia-content">
                          <form id="addContactModalTitle">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3 incidencia-name">
                                  <label type="text" id="i-name" class="form-control">Incidencia</label>
                                  <span class="validation-text text-danger"></span>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mb-3 incidencia-name">
                                  <input type="text" name="nombre" class="form-control text-uppercase" placeholder="Nombre"/>
                                  <span class="validation-text text-danger"></span>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3 incidencia-sistema">
                                  <label type="text" class="form-control">Sistema</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mb-3 incidencia-sistema">
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
                                  <span class="validation-text text-danger"></span>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="btn-add-i" class="btn btn-success rounded-pill px-4">Crear</button>
                      <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif