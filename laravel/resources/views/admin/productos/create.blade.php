@extends('layouts.mainAdmin')
@section('content')
<div class="container mt-4">
    <h2>Agregar Producto</h2>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen (opcional)</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Categorías</label>
            <select name="categorias[]" class="form-select" multiple required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>


        
        <button type="submit" class="btn btn-success">Guardar Producto</button>
        <a href="{{ route('admin.home') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection
