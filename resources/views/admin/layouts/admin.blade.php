<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Chatbot WSP-->
    <div class="btn-whatsapp">
        <a href="https://api.whatsapp.com/send?phone=525536618440&text=Hola 👋🏼 me gustaría conocer el seguimiento 🤳🏼 de mi ticket 🧾😃" target="_blank">
        <img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt="">
        </a>
    </div>
    <!--              wsp          -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Innova Technology </title> <link rel="shortcut icon" type="image/ico" href="{{ asset('/libs/index/img/logo/innova.ico') }}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('libs/sbadmin/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('libs/sbadmin/css/whatsapp.css')}}" rel="stylesheet">
    <link href="{{asset('libs/sbadmin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    @livewireStyles
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard')  }}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img src="http://127.0.0.1:8000/libs/index/img/logo/logo2.jpeg" alt="Logo" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">Innova Technology</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if(Route::current()->uri() == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard')  }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            

            <!-- Nav Item - Usuarios -->
            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.index']) ||  isset(json_decode(Auth::user()->rol->permisos,true)['role.index']))
                <hr class="sidebar-divider">
                <li class="nav-item  @if(Route::current()->uri() == 'admin/users' or Route::current()->uri() == 'admin/role' ) active @endif">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                        aria-expanded="true" aria-controls="collapseUsers">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Usuarios</span>
                    </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.index']) )
                                <a class="collapse-item"  href="{{ route('index.users') }}">Usuarios</a>
                            @endif
                            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['role.index']) )
                                <a class="collapse-item" href="{{ route('index.role') }}">Roles & Permisos</a>
                            @endif
                        </div>
                    </div>
                </li>
            @endif

            <!-- Nav Item - Usuarios -->
            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['grupos.index']))
                <li class="nav-item  @if(Route::current()->uri() == 'admin/grupos' ) active @endif">
                    <a class="nav-link" href="{{ route('index.grupos')}}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>
                            Grupos de Trabajo
                        </span>
                    </a>
                </li>
            @endif
            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['quejas.index']))
                <li class="nav-item @if(Route::current()->uri() == 'admin/quejas' || Route::current()->uri() == 'admin/empresas' ) active @endif">
                    <a class="nav-link" href="{{ route('index.quejas')}}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>
                            Tickets
                        </span>
                    </a>
                </li>
            @endif
            <!-- Nav Item - Pages Collapse Menu -->
            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['reportes.index']))
                <li class="nav-item @if(Route::current()->uri() == 'admin/reportes' ) active @endif">
                    <a class="nav-link" href="{{ route('index.reportes')}}">
                        <i class="fas fa-file-pdf"></i>
                        <span>
                            Reportes
                        </span>
                    </a>
                </li>
            @endif

            <!-- Nav Item - Pages Collapse Menu -->
            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['evaluacion.index']))
                <li class="nav-item @if(Route::current()->uri() == 'admin/evaluacion') active @endif">
                    <a class="nav-link" href="{{ route('index.evaluacion',0)}}">
                        <i class="fas fa-chart-area"></i>
                        <span>
                            Evaluación al Desempeño
                        </span>
                    </a>
                </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Search -->
                    
                    @livewire('search')


                    <!-- Topbar Navbar Menu --> 
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>

                        <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                @livewire('notification')
                            </li>
                         <!-- Nav Item - Alerts -->

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name}}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="@if(Auth::user()->profile_photo_path != null) {{asset('storage/'.Auth::user()->profile_photo_path)}}@else {{Auth::user()->profile_photo_url}} @endif" alt="{{  Auth::user()->name }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        @yield('cabecera')

                    <!-- Content Principal -->
                    <div class="row">

                        @yield('contenido')

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Innova Technology</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Cerrar Sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Salir" Si tu deseas cerrar Sesión.</div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                      
                        <button type="submit" class="btn btn-primary">Salir</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    </form>                
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
</body>
        
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('libs/sbadmin/jquery/jquery.min.js')  }}"></script>
    <script src="{{ asset('libs/sbadmin/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>

    <!-- Core plugin JavaScript-->
    {{-- <script src="{{ asset('libs/sbadmin/jquery-easing/jquery.easing.min.js')  }}"></script> --}}

    <!-- Custom scripts for all pages-->
    {{-- <script src="{{ asset('libs/sbadmin/js/sb-admin-2.min.js')  }}"></script> --}}

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>


    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('libs/sbadmin/datatables/jquery.dataTables.min.js')  }} "></script>
    <script src="{{ asset('libs/sbadmin/datatables/dataTables.bootstrap4.min.js')  }} "></script>



    <script src="{{ asset('libs/sbadmin/js/datatable.js')  }}"></script>
    <script src="{{ asset('js/buscador.js')  }}"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    @include('sweetalert::alert')
</html>