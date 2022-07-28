<div>
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" wire:poll.30s.keep-alive>
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if (count(auth()->user()->unreadNotifications))
            <span class="badge badge-danger badge-counter">
                {{count(auth()->user()->unreadNotifications)}}+
            </span>
        @endif
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Centro de Alertas
        </h6>
        @foreach (auth()->user()->unreadNotifications as $notificaion)
            @if ($notificaion->type == "App\Notifications\TicketNotification")
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">
                            {{$notificaion->created_at->format('l jS \\of F Y h:i:s A')}}
                        </div>
                        <span class="font-weight-bold">
                                Registro de 
                                {{$notificaion->data['razon']}}
                                <small>
                                    @if ($notificaion->data['asunto'] == 1)
                                        (Queja)
                                    @endif
                                    @if ($notificaion->data['asunto'] == 2)
                                        (Devolución)
                                    @endif
                                </small>
                            <small>
                                <br>
                                {{$notificaion->created_at->diffForHumans()}}
                            </small>
                        </span>
                    </div>
                </a>
            @endif
            @if ($notificaion->type == "App\Notifications\StatusNotification")
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">
                            {{$notificaion->created_at->format('l jS \\of F Y h:i:s A')}}
                        </div>
                        <span class="font-weight-bold">
                                {{$notificaion->data['message']}} ({{$notificaion->data['razon']}}) a
                                @if ($notificaion->data['status'] == 1)
                                    Abierto
                                @endif
                                @if ($notificaion->data['status'] == 2)
                                    Proceso
                                @endif
                                @if ($notificaion->data['status'] == 3)
                                    Cerrado
                                @endif
                                <small>
                                    @if ($notificaion->data['asunto'] == 1)
                                        (Queja)
                                    @endif
                                    @if ($notificaion->data['asunto'] == 2)
                                        (Devolución)
                                    @endif
                                </small>
                            <small>
                                <br>
                                {{$notificaion->created_at->diffForHumans()}}
                            </small>
                        </span>
                    </div>
                </a>
            @endif
            @if ($notificaion->type == "App\Notifications\AsignarNotificacion")
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">
                            {{$notificaion->created_at->format('l jS \\of F Y h:i:s A')}}
                        </div>
                        <span class="font-weight-bold">
                                Asignación de 
                                {{$notificaion->data['razon']}}
                                <small>
                                    @if ($notificaion->data['asunto'] == 1)
                                        (Queja)
                                    @endif
                                    @if ($notificaion->data['asunto'] == 2)
                                        (Devolución)
                                    @endif
                                </small>
                            <small>
                                <br>
                                {{$notificaion->created_at->diffForHumans()}}
                            </small>
                        </span>
                    </div>
                </a>
            @endif
        @endforeach
        @if (count(auth()->user()->unreadNotifications) == 0)
            <br>
            <center>
                <h6 class="font-weight-bold">
                    Sin Notificaciones
                </h6>
            </center>
        @endif
        @if (count(auth()->user()->unreadNotifications) != 0)
            <a class="dropdown-item text-center small text-gray-500" href="{{route('notificaciones.leidas')}}">
                Marcar leídas
            </a>
        @endif
    </div>
</div>
