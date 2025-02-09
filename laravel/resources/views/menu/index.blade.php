@extends('layouts.main')
@section('content')
<div class="container">

    <h1 class="text-center mb-4 mt-3">Anuncios</h1>
    @if ($anuncios->count() > 0)
        <div class="anuncios">
            @foreach ($anuncios as $anuncio)
                <div class="anuncio">
                    <h3>{{ $anuncio->titulo }}</h3>
                    <p>{{ $anuncio->mensaje }}</p>
                    <small>Promoción válida desde el {{ $anuncio->fecha_inicio }} hasta el {{ $anuncio->fecha_fin }}</small>
                </div>
            @endforeach
        </div>
    @endif

    <h1 class="text-center mb-4 mt-3">Carta</h1>
    <form action="{{ route('menu.index') }}" method="GET" class="mb-4">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Busca el producto que quieras" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary"><i class="fi fi-br-search">&nbsp;&nbsp;Buscar</i></button>
        </div>
    </form>

    @foreach($categorias as $categoria)
        @if($categoria->productos->count() > 0)
            <h2>{{ $categoria->nombre }}</h2>
            <div class="row">
                @foreach($categoria->productos as $producto)
                    <div class="col-md-4 mb-4">
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
        @endif
    @endforeach
</div>
@endsection

