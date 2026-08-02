<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Panel de Administración')</title>

    <!-- CSS -->
    <link href="{{ asset('assets/css/Site.admin.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/b.png') }}">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/Generic/Generic.js') }}"></script>
</head>

<body class="bg-light">

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-light border-bottom sticky-top shadow-sm" style="background:#003463;">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <form class="d-none d-md-flex ms-2">

        </form>


        <div class="dropdown">

            @if(Auth::check())

            <button class="btn btn-light border shadow-sm rounded-pill d-flex align-items-center"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                    style="width:38px;height:38px;font-weight:600;">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>

                <div class="text-start me-2">
                    <div class="fw-semibold" style="font-size:14px;">
                        {{ Auth::user()->name }}
                    </div>
                </div>

                <i class="fas fa-chevron-down text-muted"></i>

            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-2" style="min-width:280px;">

                <li class="px-3 py-2 border-bottom">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-3"
                            style="width:50px;height:50px;font-size:18px;font-weight:bold;">
                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                        </div>

                        <div>
                            <div class="fw-bold">
                                {{ Auth::user()->name }}
                            </div>

                            <small class="text-muted">
                                {{ Auth::user()->email }}
                            </small>
                        </div>

                    </div>

                </li>

                <li class="mt-2">
                    <a class="dropdown-item rounded-3" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user-circle me-2 text-primary"></i>
                        Mi perfil
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item rounded-3 text-danger">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Cerrar sesión
                        </button>
                    </form>
                </li>

            </ul>

            @endif

        </div>

    </div>
</nav>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="sidebar-responsive shadow-sm" id="sidebar">
    @if(Auth::check())

    @endif

    <div class="accordion" id="sidebarAccordion">

        <!-- DASHBOARD -->
        <div class="accordion-item border-0 bg-transparent">
            <h2 class="accordion-header">
                <a href="{{ route('dashboard') }}"
                   class="accordion-button bg-transparent shadow-none">
                    <i class="fas fa-gauge-high me-2"></i> Dashboard
                </a>
            </h2>
        </div>

        <!-- CONFIGURACIÓN -->
        <div class="accordion-item border-0 bg-transparent">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-transparent shadow-none"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseConfiguracion">
                    <i class="fas fa-gear me-2"></i> Configuración
                </button>
            </h2>

            <div id="collapseConfiguracion" class="accordion-collapse collapse">
                <div class="accordion-body py-1">
                    <a href="{{ route('usuarios.index') }}" class="dropdown-item-custom">
                        <i class="fas fa-user-gear me-2"></i> Usuarios
                    </a>
                    <!-- <a href="" class="dropdown-item-custom">
                        <i class="fas fa-shield-halved me-2"></i> Roles y Permisos
                    </a> -->

                </div>
            </div>
        </div>

        <!-- GESTIÓN COMERCIAL -->
        <div class="accordion-item border-0 bg-transparent">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-transparent shadow-none"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseComercial">
                    <i class="fas fa-store me-2"></i> Gestión
                </button>
            </h2>

            <div id="collapseComercial" class="accordion-collapse collapse">
                <div class="accordion-body py-1">
                     <a href="{{ route('clientes.index') }}" class="dropdown-item-custom">
                        <i class="fas fa-users me-2"></i> Clientes
                    </a>

                </div>
            </div>
        </div>

        <!-- GESTIÓN DOCUMENTARIA -->
        <!-- <div class="accordion-item border-0 bg-transparent">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-transparent shadow-none"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseDocumentaria">
                    <i class="fas fa-folder-open me-2"></i> Gestión Documentaria
                </button>
            </h2>

            <div id="collapseDocumentaria" class="accordion-collapse collapse">
                <div class="accordion-body py-1">
                    <a class="dropdown-item-custom"><i class="fas fa-file-circle-plus me-2"></i> Nuevo</a>
                    <a class="dropdown-item-custom"><i class="fas fa-inbox me-2"></i> Bandeja</a>
                    <a class="dropdown-item-custom"><i class="fas fa-paper-plane me-2"></i> Enviados</a>
                    <a class="dropdown-item-custom"><i class="fas fa-box-archive me-2"></i> Archivados</a>
                </div>
            </div>
        </div> -->

    </div>
</div>

<!-- ================= CONTENIDO ================= -->
<main class="main-content mt-3 px-3">
    <div class="container-fluid">
        @yield('content')

        <div id="progress" class="modal">
            <div class="center">
                <div class="spinner-grow text-primary"></div>
                <div class="spinner-grow text-secondary"></div>
                <div class="spinner-grow text-success"></div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }

    toggle?.addEventListener('click', toggleSidebar);
    overlay?.addEventListener('click', toggleSidebar);
});
</script>

@yield('scripts')
</body>
</html>
