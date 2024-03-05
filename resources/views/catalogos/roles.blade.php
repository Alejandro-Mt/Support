@if(Auth::user()->usrdata->rol->nombre == 'ADMINISTRADOR')
  <div class="tab-pane fade" id="Roles" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="mb-3">
      <div class="input-group input-group-lg">
        <div class="card-body">
          <div class="no-block align-items-center">
            <div class="row media">
              <div class="col-md-2">
                <div class="mb-3 text-center">ID</div>
              </div>
              <div class="col-md-5">
                <div class="mb-3 text-center">Rol</div>
              </div>
              <div class="col-md-3">
                <div class="mb-3 text-center">Prefijo</div>
              </div>
              <div class="col-md-2 action-btn">
                <div class="mb-3">
                  <a class="edit">
                    <a data-bs-toggle="modal" data-bs-target="#add-r" class="btn-circle btn btn-outline-success">+</a>
                  </a>
                </div>
              </div>
            </div>
            @foreach ($roles as $rol)
              <div class="row media">
                <div class="col-md-2">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$rol->id_rol}}</label>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$rol->nombre}}</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label type="text" class="form-control text-center">{{$rol->prefijo}}</label>
                  </div>
                </div>
                <div class="col-md-2 btn-group">
                  <a data-bs-toggle="modal" data-bs-target="#edit-r{{$loop->iteration}}" class="text-dark edit">
                    <i data-feather="eye" class="feather-sm fill-white"></i>
                  </a>
                  <a data-bs-toggle="modal" data-bs-target="#borrar-r{{$loop->iteration}}" class="text-danger delete ms-2">
                    <i data-feather="trash-2" class="feather-sm fill-white"></i>
                  </a>
                </div>
              </div>
              <form method="POST" action="{{route ('URol',$rol->id_rol)}}" class="mt-5" enctype="multipart/form-data">
                @csrf
                  <!-- Modal Editar-->
                <div class="modal" id="edit-r{{$loop->iteration}}">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title">Rol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="add-contact-box">
                          <div class="add-contact-content">
                            <form id="addContactModalTitle">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3 contact-name">
                                    <label type="text" id="c-name" class="form-control">Rol</label>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3 contact-email">
                                    <input type="text" name="nombre" class="form-control text-uppercase" value="{{$rol->nombre}}"/>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3 contact-occupation">
                                    <label type="text" class="form-control">Prefijo</label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3 contact-phone">
                                    <input type="text" name="prefijo" class="form-control" value="{{$rol->prefijo}}"/>
                                    <span class="validation-text text-danger"></span>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button id="btn-edit-16-{{$loop->iteration}}" class="btn btn-success rounded-pill px-4">Guardar</button>
                        <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
                  <!-- End Modal -->
              </form>
              <form method="POST" action="{{route ('DRol',$rol->id_rol)}}" class="mt-5">
                @csrf
                @method('DELETE')
                <!-- Modal Borrar-->
                <div class="modal" id="borrar-r{{$loop->iteration}}">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title">Borrar rol</h5>
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
                        <button id="btn-edit-17-{{$loop->iteration}}" class="btn btn-success rounded-pill px-4">SI</button>
                        <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
                  <!-- End Modal -->
              </form>
            @endforeach
            <form method="POST" action="{{route ('NRol')}}" class="mt-5" enctype="multipart/form-data">
              @csrf
              <!-- Modal Añadir-->
              <div class="modal" id="add-r">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                      <h5 class="modal-title">Nuevo rol</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="add-contact-box">
                        <div class="add-contact-content">
                          <form id="addContactModalTitle">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3 contact-name">
                                  <label type="text" id="c-name" class="form-control">Rol</label>
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
                                  <label type="text" class="form-control">Prefijo</label>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="mb-3 contact-phone">
                                  <input type="text" name="prefijo" class="form-control"/>
                                  <span class="validation-text text-danger"></span>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="btn-add-r" class="btn btn-success rounded-pill px-4">Crear</button>
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