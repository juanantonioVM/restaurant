@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
<h2>Crear Nuevo Anuncio</h2>
    <form action="{{ route('anuncios.store') }}" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="titulo" required>

        <label>Mensaje:</label>
        <textarea name="mensaje" required></textarea>

        <label>Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio" required>

        <label>Fecha de Fin:</label>
        <input type="date" name="fecha_fin" required>

        <button type="submit">Guardar</button>
    </form>
</div>
@endsection