@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <h2>Editar Anuncio</h2>
    <form action="{{ route('anuncios.update', $anuncio) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Título:</label>
        <input type="text" name="titulo" value="{{ $anuncio->titulo }}" required>

        <label>Mensaje:</label>
        <textarea name="mensaje" required>{{ $anuncio->mensaje }}</textarea>

        <label>Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio" value="{{ $anuncio->fecha_inicio }}" required>

        <label>Fecha de Fin:</label>
        <input type="date" name="fecha_fin" value="{{ $anuncio->fecha_fin }}" required>

        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection