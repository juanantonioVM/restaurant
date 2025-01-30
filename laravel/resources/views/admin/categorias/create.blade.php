@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <h2>Crear Categoría</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la categoría</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
