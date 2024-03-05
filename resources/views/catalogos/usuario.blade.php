
@extends('home')
<link rel="stylesheet" href="{{asset("assets/libs/bootstrap/dist/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/style.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/libs/magnific-popup/dist/magnific-popup.css")}}"/>
@section('content')

<div class="row">
  <form class="col-md-10">
    <div class="input-group mb-3">
      <label class="input-group-text" for="Departamentos">Departamentos</label>
      <select class="form-select" id="Departamentos">
        <option selected>Selección</option>
        @foreach ($departamentos as $menu)
          <option value="{{$menu->id_departamento}}">{{$menu->nombre}}</option>
        @endforeach
      </select>
    </div>
  </form>

  <div class="col-md-2 action-btn">
    <div class="mb-3 text-center">
      <a class="edit">
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add-us" class="btn-circle btn btn-outline-success">+</a>
      </a>
    </div>
  </div>
</div>

<div class="row el-element-overlay" id="usuarios-container">
  @foreach ($equipo as $miembro)
    <div class="col-lg-3 col-md-6 usuario" data-departamento="{{$miembro->usrdata->departamento->id_departamento}}">
      <div class="card">
        <div class="el-card-item pb-3">
          <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
              @if ($miembro->usrdata->avatar)
                  <img src="{{$miembro->usrdata->avatar}}" alt="user" class="d-block position-relative w-100"/>
              @else
                  <img src="{{asset("assets/images/users/1.jpg")}}" alt="user" class="d-block position-relative w-100"/>
              @endif
            <div class="el-overlay w-100 overflow-hidden">
              <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                <li class="el-item d-inline-block my-0 mx-1">
                  <a data-bs-toggle="modal" data-bs-target="#edit-us{{$loop->iteration}}" class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white" href={{$miembro->usrdata->avatar}}>
                    <i class="ri-search-line"></i>
                  </a>
                </li>
                <li class="el-item d-inline-block my-0 mx-1">
                  <a data-bs-toggle="modal" data-bs-target="#acceso-s-{{$loop->iteration}}" class="btn default btn-outline el-link text-white border-white" href="javascript:void(0);">
                    <i class="ri-links-line"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="el-card-content text-center">
            <h4 class="mb-0">{{$miembro->nombreCompleto()}}</h4>
            <span class="text-muted">{{$miembro->email}}</span>
          </div>
        </div>
      </div>
    </div>
    @include('user.infouser')
    @include('user.accesosistema')
  @endforeach
</div>

<form method="POST" action="{{route ('NUsuario')}}" class="mt-5">
  @csrf
  <!-- Modal Añadir-->
  <div class="modal" id="add-us">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5 class="modal-title">Nuevo responsable</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="add-user-box">
            <div class="add-user-content">
              <form id="addContactModalTitle">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3 user-name">
                      <label type="text" class="form-control">Nombre(s)</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 user-name">
                      <input type="text" name="nombre" class="form-control text-uppercase" placeholder="Nombre usuario" value="{{ old('nombre') }}" autofocus required/>
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
                      <input type="text" name="a_pat" class="form-control text-uppercase" placeholder="Apellido paterno" value="{{ old('a_pat') }}" autofocus required/>
                      <span class="validation-text text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3 user-secondlastname">
                      <label type="text" class="form-control">Apellido materno</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 user-secondlastname">
                      <input type="text" name="a_mat" class="form-control text-uppercase" placeholder="Apellido materno" value="{{ old('a_mat') }}" autofocus required/>
                      <span class="validation-text text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3 user-email">
                      <label type="text" class="form-control">Correo</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 user-email">
                      <input type="email" name="email" class="form-control @error ('email') is-invvalid @enderror" placeholder="example@it-strategy.mx" value="{{ old('email') }}" autofocus required/>
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
                    <div class="mb-3 user-departamento">
                      <label type="text" class="form-control">Departamento</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 user-departamento">
                      <select class="form-select @error ('id_departamento') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_departamento" aria-hidden="true" required autofocus>
                        <option value={{null}}>Seleccion</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id_departamento }}" {{ old('id_departamento') == $departamento->id_departamento ? 'selected' : '' }}>{{ $departamento->nombre }}</option>
                        @endforeach;
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
                    <div class="mb-3 user-division">
                      <label for="password-confirm" type="text" class="form-control" data-toggle="tooltip" data-toggle-placement="top" title="Default tooltip">División</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 user-division">
                      <select class="form-select @error ('id_division') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_division" aria-hidden="true" required autofocus>
                        <option value={{null}}>Seleccion</option>
                        @foreach ($divisiones as $division)
                        <option value="{{ $division->id_division }}" {{ old('id_division') == $division->id_division ? 'selected' : '' }}>{{ $division->nombre }}</option>
                        @endforeach;
                        @error('id_division')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror                        
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3 user-puesto">
                      <label for="puesto" type="text" class="form-control" data-toggle="tooltip" data-toggle-placement="top" title="Default tooltip">Puesto</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 user-puesto">
                      <select class="form-select @error ('id_puesto') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_puesto" aria-hidden="true" required autofocus>
                        <option value={{null}}>Seleccion</option>
                        @foreach ($puestos as $puesto)
                          <option value="{{ $puesto->id_puesto }}" {{ old('id_departamento') == $puesto->id_puesto ? 'selected' : '' }}>{{ $puesto->nombre }}</option>
                        @endforeach;
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
                      <label for="rol" type="text" class="form-control" data-toggle="tooltip" data-toggle-placement="top" title="Default tooltip">Rol</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 user-rol">
                      <select class="form-select @error ('id_rol') is-invvalid @enderror" style="width: 100%; height:36px;" name="id_rol" aria-hidden="true" required autofocus>
                        <option value={{null}}>Seleccion</option>
                          @foreach ($roles as $rol)
                            <option value="{{ $rol->id_rol }}" {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                          @endforeach; 
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
          <button id="btn-edit-20" class="btn btn-success rounded-pill px-4">Crear</button>
          <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End -->
</form>

@endsection
<!-- scripts page -->
<script src="{{asset("assets/libs/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset("assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
<!--Wave Effects -->
<script src="{{asset("assets/js/waves.js")}}"></script>
<script src="{{asset("assets/extra-libs/DataTables/js/jquery.dataTables.min.js")}}"></script>

<script>
  function update(caja){
    //var name = $('#'+caja).attr('id'); //id de figura
    var create = document.getElementById(caja);
    var des = document.getElementById(caja).value;
    //console.log(create)
    //console.log(des)
    if (create.checked == true) {
      //insert
      $.ajax({
          headers:{'X-CSRF-TOKEN' : "{{csrf_token()}}"},
          type: "POST",
          url: "accesos."+caja
        });
      //console.log(1)
    }else{
      //destroy
      $.ajax({
          headers:{'X-CSRF-TOKEN' : "{{csrf_token()}}"},
          type: "GET",
          url: "accesos.update."+caja
        });
    };
  }
  $(document).ready(function () {
    // Ocultar todos los usuarios al inicio
    $('.usuario').addClass('d-none');

    // Manejar el evento de cambio en el menú desplegable de departamentos
    $('#Departamentos').change(function () {
      // Obtener el valor seleccionado
      var selectedDepartment = $(this).val();

      // Ocultar todos los usuarios
      $('.usuario').addClass('d-none');

      // Mostrar solo los usuarios del departamento seleccionado
      $('.usuario[data-departamento="' + selectedDepartment + '"]').removeClass('d-none');
    });
  });
</script>


