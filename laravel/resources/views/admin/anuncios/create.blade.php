@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
<h2>Crear Nuevo Anuncio</h2>
    <p style="font-size: small; color: red;">* Campos obligatorios</p>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Consideraciones:</strong> Para una promoción recurrente en el tiempo en el restaurante, no hace falta poner fecha, pero si horario y día de la semana.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Consideraciones:</strong> Para una promoción de un día específico (esporádica) no hay que poner horario ni día de la semana, pero sí fecha.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <form action="{{ route('anuncios.store') }}" method="POST">
        @csrf
        <label for="titulo" class="form-label">Título: *</label>
        <input type="text" name="titulo" class="form-control" required><br><br>

        <label for="mensaje" class="form-label">Mensaje: *</label>
        <textarea name="mensaje" class="form-control" required></textarea><br><br>

        <label for="fecha" class="form-label">Fecha de la promoción:</label>
        <input type="date" name="fecha" class="form-control"><br><br>

        <label for="inicio" class="form-label">Hora de inicio:</label>
        <input type="time" name="inicio" class="form-control"><br><br>

        <label for="fin" class="form-label">Hora de finalización:</label>
        <input type="time" name="fin" class="form-control"><br><br>

        <label for="dia_semana" class="form-label">Día de la semana que se aplica el descuento:</label>
        <select id="dia_semana" name="dia_semana" class="form-control">
            <option value="">Promoción esporádica</option>
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miércoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sábado</option>
            <option value="0">Domingo</option>
        </select><br><br>

        <button class="btn btn-success mb-3" type="submit">Guardar</button>
    </form>
</div>
@endsection