<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$titulo}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for datatbles-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- barra lateral -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-cart-fill">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16" style="width: 1.5em; height: 1.5em;">
                            <image xlink:href="{{asset('img\logo_pequeño.png')}}" width="16" height="16" />
                        </svg></i>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16" style="width: 8em; height: 8em;">
                    <image xlink:href="{{asset('img\logo_letras.png')}}" width="16" height="16" />
                </svg></i>
            </a>

            <!-- barra lateral -->
            <li class="nav-item">
                @if(!Auth::check())
                    <a class="nav-link" href="{{ route('clientes_guest') }}" style="color: black; font-size: 14px;">
                @else
                    <a class="nav-link" href="{{ route('cliente.homeIndex') }}" style="color: black; font-size: 14px;">
                @endif
                
                    <img src="{{asset('img/compras.png')}}" width=30 height="30">
                    <span style="color: black;">Inicio</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('carrito') }}" style="color: black; font-size: 14px;">
                    <img src="{{asset('img/carritoN.png')}}" width=30 height="30">
                    <span style="color: black;">Carrito</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('cliente.mis_compras')}}" style="color: black; font-size: 14px;">
                    <img src="{{asset('img/caja.png')}}" width=30 height="30">
                    <span style="color: black;">Mis compras</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('cliente.favoritos')}}" style="color: black; font-size: 14px;">
                    <img src="{{asset('img/favorito.png')}}" width=30 height="30">
                    <span style="color: black;">Favoritos</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cliente.ayuda') }}" style="color: black; font-size: 14px;">
                    <img src="{{ asset('img/ayuda.png') }}" width="30" height="30">
                    <span style="color: black;">Ayuda</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('cliente.somos') }}" style="color: black; font-size: 14px;">
                    <img src="{{ asset('img/equipo.png') }}" width="30" height="30">
                    <span style="color: black;">Quiénes somos</span>
                </a>
            </li>
            
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.336);">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline" style="color: black;">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Barra de búsqueda -->
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search"
                                aria-describedby="basic-addon2" style="width: 500px;"> 
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Carrito de compras -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link" href="{{route('carrito')}}" id="carritoDropdown" role="button"
                             aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart fa-fw"></i>
                                <!-- Counter - Items en el carrito -->
                                <span class="badge badge-primary badge-counter">
                                    @if(session('carrito'))
                                        @php
                                            $cantidad = 0;
                                            foreach(session('carrito') as $item){
                                                $cantidad += $item['cantidad'];
                                            }
                                        @endphp
                                        {{$cantidad}}
                                        
                                    @else
                                        0
                                    @endif
                                </span>
                            </a>

                            <!-- Dropdown - Carrito de compras -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="carritoDropdown">
                                <h6 class="dropdown-header">
                                    Carrito de compras
                                </h6>
                                <!-- Ejemplo de elemento en el carrito -->
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <img src="ruta/a/la/imagen.jpg" class="img-fluid rounded" alt="Producto">
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Nombre del Producto</div>
                                        <span class="font-weight-bold">$50.00</span>
                                    </div>
                                </a>
                                <!-- Fin del ejemplo -->
                                <a class="dropdown-item text-center small text-gray-500" href="{{ route('carrito') }}">Ir al carrito de compras</a>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificaciones
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">13 may 2024</div>
                                        <span class="font-weight-bold">Entrega programada para el prox. lunes</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">10 may 2024</div>
                                    ¡Hemos entregado tu pedido!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">2 may 2024</div>
                                        Alerta de gastos: Hemos notado gastos inusualmente altos en su cuenta.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">4+</span>
                            </a>

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Mensajes
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://www.uber-assets.com/image/upload/f_auto,q_auto:eco,c_fill,w_956,h_956/v1675245816/assets/db/df90dc-09b5-4876-9459-5a2a5a93f1d3/original/UberIM_008570-large-%281%29.webp"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Ya voy para su domicilio</div>
                                        <div class="small text-gray-500">Maria Jose · 5:19 pm </div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://www.sopitas.com/wp-content/uploads/2016/08/meme-juan-gabriel-palmera-origan.png"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Solamente tenemos coca sin azucar</div>
                                        <div class="small text-gray-500">Juan Gabriel · sab</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyp8DE41SJEGqBDiJ-dKKEjlEclFDg-baYUn-ADi2XUg&s"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">¿Gusta agregar algo mas a su lista de compras? </div>
                                        <div class="small text-gray-500">Cortana Godinez · 29 abr</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://img.buzzfeed.com/buzzfeed-static/static/2017-05/16/14/asset/buzzfeed-prod-fastlane-03/sub-buzz-31712-1494958682-9.jpg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">tambien tenemos botanas para su amigo</div>
                                        <div class="small text-gray-500">Don Raul · 15 nov 2023</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todos los mensajes</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <div class="container-fluid">
                        @if(!Auth::check())
                        <li class="nav-item dropdown no-arrow">
                            <a class="btn btn-primary" href="{{route('login')}}">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/>
                                <line x1="15" x2="3" y1="12" y2="12"/></svg></i>
                                Iniciar sesión</a>
                        </li>
                        @endif
                             
                        <!-- Nav Item - User Information -->
                        @if (Auth::check())
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                        
                                    <img class="img-profile rounded-circle"
                                        src="{{asset('img/usuario.png')}}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">

                                    <a class="dropdown-item" href="{{route('profile.show')}}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Mi perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-map-marker-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Direcciones
                                    </a>  
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Configuraciones
                                    </a>                                 
                                    <div class="dropdown-divider"></div>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <a class="dropdown-item" href="{{route('logout')}}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Cerrar sesion
                                        </a>

                                    </form>
                                    
                                </div>
                            </li>
                        @endif
                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>{{$titulo}}</h1>
                    {{ $slot }}

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white py-3"> <!-- Agrega clases py-3 para añadir padding en la parte superior e inferior -->
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MegaMartMX 2024</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @livewireScripts
</body>

</html>