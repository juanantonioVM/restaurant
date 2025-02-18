@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <h2 class="fuente-personalizada-titulo">Lista de Anuncios</h2>
        <a href="{{ route('anuncios.create') }}" class="btn btn-success">Nuevo Anuncio</a>

@php
    $diasSemana = ['domingos', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábados'];
@endphp

        @foreach ($anuncios as $anuncio)
            <div class="card mt-3 p-3 shadow mb-3">
                <h3>{{ $anuncio->titulo }}</h3>
                <p>{{ $anuncio->mensaje }}</p>
                @if ($anuncio->fecha)  
                    <!-- Para promociones que se dan en días específicos -->
                    <small class="text-muted mb-3">Disponible únicamente durante el <strong>{{ date('d/m/Y', strtotime($anuncio->fecha)) }}</strong></small>

                @elseif ($anuncio->dia_semana !== null && $anuncio->inicio && $anuncio->fin)
                    <!-- Para promociones que se dan de manera recurrente cada semana -->
                    <small class="text-muted mb-3">
                        Promoción válida todos los <strong>{{ __($diasSemana[$anuncio->dia_semana]) }}</strong>
                        de <strong>{{ date('H:i', strtotime($anuncio->inicio)) }}</strong> a <strong>{{ date('H:i', strtotime($anuncio->fin)) }}</strong>
                    </small>
                @endif
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