@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <h2>Lista de Anuncios</h2>
        <a href="{{ route('anuncios.create') }}" class="btn btn-primary">Nuevo Anuncio</a>

        @foreach ($anuncios as $anuncio)
            <div class="card mt-3 p-3">
                <h3>{{ $anuncio->titulo }}</h3>
                <p>{{ $anuncio->mensaje }}</p>
                <p>Desde: {{ $anuncio->fecha_inicio }} - Hasta: {{ $anuncio->fecha_fin }}</p>
                <a href="{{ route('anuncios.edit', $anuncio) }}" class="btn btn-warning mb-3">Editar</a>
                <form action="{{ route('anuncios.destroy', $anuncio) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        @endforeach
</div>
@endsection