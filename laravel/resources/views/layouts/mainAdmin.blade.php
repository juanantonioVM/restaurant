<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href="{{ asset('css/styles.css') }}">
    <title>Administrador - Mesón Jiménez</title>
</head>
<body>
<div class="body-background"></div>
<!-- NAVBAR DE ADMINISTRADOR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fuente-personalizada-titulo" href="#">Meson Jimenez</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fuente-personalizada-titulo-2 ms-5" href="{{ route('menu.index') }}">🍽️ Ver carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fuente-personalizada-titulo-2 ms-5" href="{{ route('admin.home') }}">🧑‍💻 Inicio de administrador</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                @auth
                    <p class="text-light me-3 mt-3">Bienvenido, {{ auth()->user()->name }}</p>
                        
                    <a href="javascript: document.getElementById('logout').submit()" class="btn btn-sm btn-danger">Cerrar sesión</a>
                    <form id="logout" action="{{route('logout')}}" method="POST" style="display:none">@csrf</form>
                @endauth
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>