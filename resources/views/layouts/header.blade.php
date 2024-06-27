<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" id="nav-header"> 
      <a class="nav-toggler waves-effect waves-light d-block d-md-none">
        <i class="ri-close-line fs-6 ri-menu-2-line"></i>
      </a> 
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <a class="navbar-brand" href={{route('home') }}>
        <!-- Logo icon -->
        <b class="logo-icon">
          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
          <!-- Dark Logo icon -->
          <img src={{asset("assets/images/logo-icon-it.png")}} alt="homepage" class="dark-logo" width="50" height="50"/>
          <!-- Light Logo icon -->
          <img src={{asset("assets/images/icon-it.png")}} alt="homepage" class="light-logo" width="50" height="50"/>
          <!--End Logo icon -->
          <!-- Logo text -->
        </b>
        <!--End Logo icon -->
        <!-- Logo text -->
        <span class="logo-text">
          <!-- dark Logo text -->
          <img src="{{asset("assets/images/logo-text-it.png")}}" alt="homepage" class="dark-logo" width="100" height="70"/>
          <!-- Light Logo text -->
          <img src="{{asset("assets/images/text-it.png")}}" class="light-logo" alt="homepage" width="100" height="70"/>
        </span>
        <!--End Logo icon -->
      </a>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Toggle which is visible on mobile only -->
      <!-- ============================================================== -->
      <a class="topbartoggler d-block d-md-none waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="ri-more-line fs-6"></i>
      </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav me-auto">
        <!--<li class="nav-item d-none d-md-block">
            <a class="nav-link sidebartoggler waves-effect waves-dark" href="javascript:void(0)">
                <i data-feather="menu" class="mdi mdi-menu font-24"></i>
            </a>
        </li>-->
        <!-- ============================================================== -->
        <!-- create new -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none d-md-block">Nuevo <i class="fa fa-angle-down"></i></span>
            <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item mdi mdi-hand-pointing-right" href="{{ route('Formulario_Soporte') }}">Nueva solicitud</a></li>
            @if(Auth::user()->usrdata->rol->id_rol === 2 || Auth::user()->usrdata->rol->id_rol === 4)
              <li><a class="dropdown-item" href={{route('CM')}}>Carga masiva</a></li>
            @endif
          </ul>
        </li>
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
        <li class="nav-item d-none d-md-block search-box"> 
          <a class="nav-link d-none d-md-block waves-effect waves-light" href="javascript:void(0)">
            <i class="ti-search"></i>
          </a>
          <form class="app-search">
            <input type="text" class="form-control" placeholder="Search &amp; enter"> 
            <a class="srh-btn">
              <i data-feather="x" class="ti-close"></i>
            </a>
          </form>
        </li>
      </ul>
      <!-- ============================================================== -->
      <!-- Right side toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav justify-content-end">
        <!-- ============================================================== -->
        <!-- Comment -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i data-feather="bell"></i>
            @if( Auth::user()->unreadNotifications->count() != 0 )
              <div class="notify">
                <span class="heartbit"></span> <span class="point"></span>
              </div>
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
            <span class="with-arrow"><span class="bg-primary"></span></span>
            <ul class="list-style-none">
              <li>
                <div class="drop-title bg-primary text-white">
                  <h4 class="mb-0 mt-1">
                    {{ Auth::user()->unreadNotifications->count() }} {{Auth::user()->unreadNotifications->count() == 1 ? 'Nueva' : 'Nuevas'}}
                  </h4>
                  <span class="fw-light">{{Auth::user()->unreadNotifications->count() == 1 ? 'Notificación' : 'Notificaciones'}}</span>
                </div>
              </li>
              <li>
                <div class="message-center notifications">
                  <!-- Message -->
                  @foreach (Auth::user()->unreadNotifications as $notify)
                    <a href={{ route('Visto', $notify->id) }} class="message-item">
                      <span class="btn btn-light-success text-success btn-circle">
                        <i data-feather="bookmark" class="feather-sm fill-white"></i>
                      </span>
                      <div class="mail-contnet">
                        <h5 class="folio">{{ $notify->data['folio'] }}</h5>
                        <span class="mail-desc">{{ $notify->data['message'] }}</span>
                        <span class="time">{{ $notify->created_at->diffForHumans() }}</span>
                      </div>
                    </a>
                  @endforeach
                  <!-- Message --
                  <a href="#" class="message-item">
                    <span class="btn btn-light-success text-success btn-circle">
                      <i data-feather="calendar" class="feather-sm fill-white"></i>
                    </span>
                    <div class="mail-contnet">
                      <h5 class="message-title">Event today</h5>
                      <span class="mail-desc">Just a reminder that you have event</span>
                      <span class="time">9:10 AM</span>
                    </div>
                  </a>
                  <!-- Message --
                  <a href="#" class="message-item">
                    <span class="btn btn-light-info text-info btn-circle">
                      <i data-feather="settings" class="feather-sm fill-white"></i>
                    </span>
                    <div class="mail-contnet">
                      <h5 class="message-title">Settings</h5>
                      <span class="mail-desc"
                        >You can customize this template as you want</span
                      >
                      <span class="time">9:08 AM</span>
                    </div>
                  </a>
                  <!-- Message --
                  <a href="#" class="message-item">
                    <span class="btn btn-light-primary text-primary btn-circle">
                      <i data-feather="users" class="feather-sm fill-white"></i>
                    </span>
                    <div class="mail-contnet">
                      <h5 class="message-title">Pavan kumar</h5>
                      <span class="mail-desc">Just see the my admin!</span>
                      <span class="time">9:02 AM</span>
                    </div>
                  </a>
                </div>
              </li>
              <!--<li>
                <a class="nav-link text-center mb-1 text-dark" href="#">
                  <strong>Check all notifications</strong>
                  <i data-feather="chevron-right" class="feather-sm"></i>
                </a>
              </li>-->
            </ul>
          </div>
        </li>
        <!-- ============================================================== -->
        <!-- End Comment -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Messages -->
        <!-- ============================================================== -->
        <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="font-24 mdi mdi-comment-processing"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="2">
                <ul class="list-style-none">
                    <li>
                        <div class="">
                            <-- Message --
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-success btn-circle"><i
                                            class="ti-calendar"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Event today</h5>
                                        <span class="mail-desc">Just a reminder that event</span>
                                    </div>
                                </div>
                            </a>
                            <-- Message --
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-info btn-circle"><i
                                            class="ti-settings"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Settings</h5>
                                        <span class="mail-desc">You can customize this template</span>
                                    </div>
                                </div>
                            </a>
                            <-- Message --
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-primary btn-circle"><i
                                            class="ti-user"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                    </div>
                                </div>
                            </a>
                            <-- Message --
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-danger btn-circle"><i
                                            class="fa fa-link"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Luanch Admin</h5>
                                        <span class="mail-desc">Just see the my new admin!</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </ul>
        </li>-->
        <!-- ============================================================== -->
        <!-- End Messages -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if (Auth::user()->usrdata->avatar)
              <img src="{{asset(Auth::user()->usrdata->avatar)}}" alt="user" class="profile-pic rounded-circle" width="30"/>
            @else
              <img src="{{asset("assets/images/users/1.jpg")}}" alt="user" class="profile-pic rounded-circle" width="30"/>
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
            <div class="d-flex no-block align-items-center p-3 bg-primary text-white mb-2">
              <div class="">
                @if (Auth::user()->usrdata->avatar)
                  <img src="{{asset(Auth::user()->usrdata->avatar)}}" alt="user" class="rounded-circle" width="60"/> 
                @else
                  <img src="{{asset("assets/images/users/1.jpg")}}" alt="user" class="rounded-circle" width="60"/>    
                @endif
              </div>
              <div class="ms-2">
                <h4 class="mb-0 text-white">{{Auth::user()->nombreCompleto()}}</h4>
                <p id="id" class="mb-0">{{Auth::user()->email}}</p>
              </div>
            </div>
            <a class="dropdown-item" href="{{route('profile',Auth::user()->id_user)}}">
              <i data-feather="user" class="feather-sm text-info me-1 ms-1"></i>
              Perfil
            </a>
            @if (Auth::user()->usrdata->id_rol == 2 || Auth::user()->usrdata->id_rol == 4)
              <a class="dropdown-item d-flex d-block" href="{{route('Reporte')}}">
                <i class="ri-file-excel-2-line ms-s"></i>
                  <span class="ms-1">Reporte de tickets</span>
              </a>
            @endif
              <!--<a class="dropdown-item d-flex d-block" href="{route('AutP')}}">
                <i class="feather-icon" data-feather="archive"></i>
                <span class="ms-1">Autorización a prioridades</span>
              </a>
            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email me-1 ms-1"></i>Inbox</a>
            <div class="dropdown-divider"></div>-->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off me-1 ms-1" ></i>
              {{ __('Salir') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            <!--<div class="dropdown-divider"></div>
            <div class="ps-4 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">View Profile</a></div>-->
          </div>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
      </ul>
    </div>
  </nav>
</header>

@include('soporte.desplegables.importar');