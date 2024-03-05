
<!--if ($comentario->respuesta == 'No')-->
  <div class="d-flex flex-row comment-row border-bottom p-3">
    <div class="p-2">
      @if ($comentario->user_data->avatar)
        <img src="{{$comentario->user_data->avatar}}" alt="user" width="50" class="rounded-circle"/> 
      @else
        <img src="{{asset("assets/images/users/1.jpg")}}" alt="user" width="50" class="rounded-circle"/>    
      @endif
    </div>
    <div class="comment-text w-100">
      <h6 class="font-medium">{{ $comentario->user->full_name }}</h6>
      <span class="mb-3 d-block">{{$comentario->comentario}}</span>
      <div class="comment-footer d-md-flex align-items-center">
        <span class="badge bg-light-danger text-danger rounded-pill font-weight-medium fs-1 py-1">{{$comentario->user_data->rol->nombre}}</span>
        <span class="action-icons">
          <a data-bs-toggle="collapse" href="#r-{{$loop->iteration}}" role="button" aria-expanded="false" aria-controls="r-{{$loop->iteration}}" class="ps-3">
            <i data-feather="edit-3" class="feather-icon feather-sm"></i>
          </a>
        </span>
        <div class="text-muted ms-auto mt-2 mt-md-0">{{$comentario->created_at->diffForHumans()}}</div>
      </div>
    </div>
  </div>
<!--else
  <div class="d-flex flex-row comment-row border-bottom p-3" style="margin-left: 50">
    <div class="p-2">
      if ($comentario->avatar == NULL)
        <img src="{asset("assets/images/users/1.jpg")}}" alt="user" width="40" class="rounded-circle"/> 
      else
        <img src="{$comentario->avatar}}" alt="user" width="40" class="rounded-circle"/>    
      endif
    </div>
    <div class="comment-text w-100">
      <h6 class="font-medium">{"$comentario->nombre $comentario->apaterno"}}</h6>
      <span class="mb-3 d-block">{$comentario->contenido}}</span>
      <div class="comment-footer d-md-flex align-items-center">
        <span class="badge bg-light-danger text-danger rounded-pill font-weight-medium fs-1 py-1">{$comentario->puesto}}</span>
        <span class="action-icons">
        </span>
        <div class="text-muted ms-auto mt-2 mt-md-0">{/*date('d-m-20y',strtotime(*/$comentario->created_at->diffForHumans()}}</div>
      </div>
    </div>
  </div>
endif-->