@extends('layouts.main')

@section('content')
<!-- NAV BAR PÚBLICA -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fuente-personalizada-titulo" href="#">Meson Jimenez</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link fuente-personalizada-titulo-2 ms-5" href="#promociones">🪧 Promociones activas</a>
                </li>
                <li class="nav-item dropdown ms-5">
                    <a class="nav-link dropdown-toggle fuente-personalizada-titulo-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">🍽️ Carta</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categorias as $categoria)
                            <li><a class="dropdown-item fuente-personalizada" href="#categoria{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ANUNCIOS ACTIVOS -->
@php
    $diasSemana = ['domingos', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábados'];
@endphp

<div class="container text-center mt-5 pt-5">
    <h1 class="mb-4 fuente-personalizada mt-5 fuente-personalizada-titulo-3" id="promociones">🪧 Promociones activas</h1>
    <div class="row justify-content-center">
        @if ($anuncios->count() > 0)
            @foreach ($anuncios as $anuncio)
                <div class="col-md-6 mb-3">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h3 class="card-title text-danger fuente-personalizada-titulo-2 fw-bold">{{ $anuncio->titulo }}</h3>
                            <p class="card-text">{{ $anuncio->mensaje }}</p>

                            @if ($anuncio->fecha)  
                                <!-- Para promociones que se dan en días específicos -->
                                <small class="text-muted">Disponible únicamente durante el <strong>{{ date('d/m/Y', strtotime($anuncio->fecha)) }}</strong></small>

                            @elseif ($anuncio->dia_semana !== null && $anuncio->inicio && $anuncio->fin)
                                <!-- Para promociones que se dan de manera recurrente cada semana -->
                                <small class="text-muted">
                                    Promoción válida todos los <strong>{{ __($diasSemana[$anuncio->dia_semana]) }}</strong>
                                    de <strong>{{ date('H:i', strtotime($anuncio->inicio)) }}</strong> a <strong>{{ date('H:i', strtotime($anuncio->fin)) }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-muted">No hay promociones activas en este momento.</p>
        @endif
    </div>
</div>

<!-- PRODUCTOS ORGANIZADOS POR CATEGORÍAS Y EL BUSCADOR -->
<div class="container mt-5">
    <h1 class="text-center mb-4 fuente-personalizada-titulo-3">🍽️ Carta</h1>
    <form action="{{ route('menu.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Busca el producto que quieras" value="{{ request('search') }}">
            <button type="submit" class="btn btn-warning"><i class="fi fi-br-search"> Buscar</i></button>
        </div>
    </form>

    @foreach($categorias as $categoria)
        @if($categoria->productos->count() > 0)
            <div class="categoria-section mt-3" id="categoria{{ $categoria->id }}">
                <h2 class="text-center mb-4 fuente-personalizada-titulo-3">{{ $categoria->nombre }}</h2>
                <div class="row">
                    @foreach($categoria->productos as $producto)
                        <div class="col-6 col-md-4 col-lg-2 mb-4">
                            <div class="card">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                    <p class="card-text">{{ $producto->descripcion }}</p>
                                    <p class="card-text"><strong>Precio:</strong> {{ $producto->precio }} €</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
</div>
@endsection

