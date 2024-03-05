<!-- Filtros -->
<ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
  
  <li class="nav-item">  
    <a type="button" class="nav-link active" data-bs-toggle="pill" href="#Our" role="tab" aria-selected="true">Mis tickets</a>
  </li>
  @if(Auth::user()->usrdata->rol->id_rol != 3)
    <li class="nav-item">  
      <a type="button" class="nav-link" data-bs-toggle="pill" href="#Principal" role="tab" aria-selected="true">Tickets</a>
    </li>
  @endif
  @if(Auth::user()->usrdata->rol->id_rol == 4)
    <li class="nav-item">
      <a class="nav-link" id="pills-client-tab" data-bs-toggle="pill" href="#Clientes" role="tab" aria-selected="false">Clientes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-depto-tab" data-bs-toggle="pill" href="#Departamento" role="tab" aria-selected="false">Departamento</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-depto-tab" data-bs-toggle="pill" href="#Division" role="tab" aria-selected="false">División</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-puesto-tab" data-bs-toggle="pill" href="#Puesto" role="tab" aria-selected="false">Puestos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-resp-tab" data-bs-toggle="pill" href="#Roles" role="tab" aria-selected="false">Roles</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-sistem-tab" data-bs-toggle="pill" href="#Sistemas" role="tab" aria-selected="false">Sistemas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-sol-tab" data-bs-toggle="pill" href="#Incidencia" role="tab" aria-selected="false">Incidencia</a>
    </li>
  @endif
</ul>
