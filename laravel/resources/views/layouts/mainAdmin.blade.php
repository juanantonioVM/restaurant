<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Menú Restaurant</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="{{ route('menu.index') }}" class="btn btn-primary btn-sm">Vista pública</a>
                <a href="{{ route('admin.home') }}" class="btn btn-info btn-sm ms-3 text-light">Inicio de administrador</a>
            </div>
                
            <div class="d-flex align-items-center">
                @auth
                    <span class="text-light me-3">Bienvenido, {{ auth()->user()->name }}</span>
                        
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