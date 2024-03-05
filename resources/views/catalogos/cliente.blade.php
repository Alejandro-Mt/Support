
@if(Auth::user()->usrdata->rol->nombre == 'ADMINISTRADOR')
  <div class="tab-pane fade" id="Clientes" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="mb-3">
      <div class="input-group input-group-lg">
        <div class="card-body">
          <div class="no-block align-items-center">
            <div class="row media">
              <div class="col-md-3">
                <div class="mb-3 text-center">ID</div>
              </div>
              <div class="col-md-6">
                <div class="mb-3 text-center">Nombre</div>
              </div>
              <div class="col-md-3 action-btn">
                <div class="mb-3">
                    <a class="edit">
                      <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add-c" class="btn-circle btn btn-outline-success">+</a>
                    </a>
                </div>
              </div>
            </div>
            @foreach ($clientes as $cliente)
              <div class="row media">
                <div class="col-md-3">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$cliente->id_cliente}}</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$cliente->nombre}}</label>
                  </div>
                </div>
                <div class="col-md-3 action-btn">
                  <div class="mb-3">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-c{{$loop->iteration}}" class="text-dark edit">
                      <i data-feather="eye" class="feather-sm fill-white"></i>
                    </a>
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#borrar-c{{$loop->iteration}}" class="text-danger delete ms-2">
                      <i data-feather="trash-2" class="feather-sm fill-white"></i>
                    </a>
                  </div>
                </div>
              </div>
              <form method="POST" action="{{route ('UCliente',$cliente->id_cliente)}}" class="mt-5" enctype="multipart/form-data">
                @csrf
                <!-- Modal Editar-->
                <div class="modal" id="edit-c{{$loop->iteration}}">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title">Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="add-contact-box">
                          <div class="add-contact-content">
                            <form id="addContactModalTitle">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3 contact-name">
                                    <label type="text" id="c-name" class="form-control">Cliente</label>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3 contact-name">
                                    <input type="text" name="nombre" class="form-control text-uppercase" value="{{$cliente->nombre}}"/>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3 contact-name">
                                    <label type="text" id="c-name" class="form-control">Estatus</label>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3 contact-estatus">
                                    <select class="form-control @error ('activo') is-invalid @enderror" required autofocus id="activo" name="activo">
                                      <option value = 1>Activo</option>
                                      <option value = 0>Inactivo</option>
                                    </select>
                                    <!--<input type="binary" name="activo" class="form-control text-uppercase" value="{{$cliente->activo}}"/>-->
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
              <form method="POST" action="{{route ('DCliente',$cliente->id_cliente)}}" class="mt-5">
                @csrf
                @method('delete')
                <!-- Modal Borrar-->
                <div class="modal" id="borrar-c{{$loop->iteration}}">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title">Borrar cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="add-contact-box">
                          <div class="add-contact-content">
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
            <form method="POST" action="{{route ('NCliente')}}" class="mt-5" enctype="multipart/form-data">
              @csrf
              <!-- Modal Añadir-->
              <div class="modal" id="add-c">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                      <h5 class="modal-title">Nuevo cliente</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="add-contact-box">
                        <div class="add-contact-content">
                          <form id="addContactModalTitle">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3 contact-name">
                                  <label type="text" id="c-name" class="form-control">Cliente</label>
                                  <span class="validation-text text-danger"></span>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mb-3 contact-email">
                                  <input type="text" name="nombre" class="form-control text-uppercase" placeholder="Nombre"/>
                                  <span class="validation-text text-danger"></span>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3 contact-occupation">
                                  <label type="text" class="form-control">Abreviación</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mb-3 contact-phone">
                                  <input type="text" name="abreviacion" class="form-control text-uppercase" placeholder="AB"/>
                                  <span class="validation-text text-danger"></span>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="btn-add-c" class="btn btn-success rounded-pill px-4">Crear</button>
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