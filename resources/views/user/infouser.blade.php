<!-- Modal Editar-->
<div class="modal fade" id="edit-us{{$loop->iteration}}" aria-labelledby="scroll-long-inner-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
    <form method="POST" action="{{route ('UUsuario',$miembro->id_user)}}" class="mt-5">
        @csrf
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title">Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="add-user-box">
          <div class="add-user-content">
            <form id="addContactModalTitle-{{$loop->iteration}}">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-name">
                    <label type="text" class="form-control">Nombre(s)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-name">
                    <input type="text" name="nombre" class="form-control text-uppercase @error ('nombre') is-invvalid @enderror" value="{{$miembro->nombre}}" required autofocus/>
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-lastname">
                    <label type="text" class="form-control">Apellido paterno</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-lastname">
                    <input type="text" name="a_pat" class="form-control text-uppercase @error ('a_pat') is-invvalid @enderror" value="{{$miembro->a_pat}}" required autofocus/>
                    @error('a_pat')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-slastname">
                    <label type="text" class="form-control">Apellido materno</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-slastname">
                    <input type="text" name="a_mat" class="form-control text-uppercase @error ('a_mat') is-invvalid @enderror" value="{{$miembro->a_mat}}" required autofocus/>
                    @error('a_mat')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-mail">
                    <label type="text" class="form-control">Correo</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-mail">
                    <input type="text" name="email" class="form-control @error ('email') is-invvalid @enderror" value="{{$miembro->email}}" required autofocus/>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-depto">
                    <label type="text" class="form-control">Departamento</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-depto">
                    <select class="form-select @error ('id_departamento') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_departamento" aria-hidden="true" required autofocus>
                      @if($miembro->usrdata && $miembro->usrdata->departamento)
                        <option value={{$miembro->usrdata->id_departamento}}>
                          {{$miembro->usrdata->departamento->nombre}}
                        </option> 
                      @else 
                        <option>SELECCIÓN</option>
                      @endif
                      @foreach ($departamentos as $departamento)
                        <option value="{{$departamento->id_departamento}}">{{$departamento->nombre}}</option>
                      @endforeach
                      @error('id_departamento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror                        
                    </select>
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-div">
                    <label type="text" class="form-control">División</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-div">
                    <select class="form-select @error ('id_division') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_division" aria-hidden="true" required autofocus>
                      @if($miembro->usrdata && $miembro->usrdata->division)
                        <option value={{$miembro->usrdata->id_division}}>
                          {{$miembro->usrdata->division->nombre}}
                        </option> 
                      @else 
                        <option>SELECCIÓN</option>
                      @endif
                      @foreach ($divisiones as $division)
                        <option value="{{$division->id_division}}">{{$division->nombre}}</option>
                      @endforeach
                      @error('id_division')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror                        
                    </select>
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-range">
                    <label type="text" class="form-control">Puesto</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-range">
                    <select class="form-select @error ('id_puesto') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_puesto" aria-hidden="true" required autofocus>
                      @if($miembro->usrdata && $miembro->usrdata->puesto)
                        <option value={{$miembro->usrdata->id_puesto}}>
                          {{$miembro->usrdata->puesto->nombre}}
                        </option> 
                      @else 
                        <option>SELECCIÓN</option>
                      @endif
                      @foreach ($puestos as $puesto)
                        <option value="{{$puesto->id_puesto}}">{{$puesto->nombre}}</option>
                      @endforeach
                      @error('id_puesto')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror                        
                    </select>
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3 user-rol">
                    <label type="text" class="form-control">Rol</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 user-rol">
                    <select class="form-select @error ('id_rol') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_rol" aria-hidden="true" required autofocus>
                      @if($miembro->usrdata && $miembro->usrdata->rol)
                        <option value={{$miembro->usrdata->id_rol}}>
                          {{$miembro->usrdata->rol->nombre}}
                        </option> 
                      @else 
                        <option>SELECCIÓN</option>
                      @endif
                      @foreach ($roles as $rol)
                        <option value="{{$rol->id_rol}}">{{$rol->nombre}}</option>
                      @endforeach
                      @error('id_rol')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror                        
                    </select>
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btn-edit-{{$loop->iteration}}" class="btn btn-success rounded-pill px-4">Guardar</button>
        <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- End Modal -->
