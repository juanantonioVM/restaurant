@extends('layouts.mainAdmin')
@section('content')
<div class="container mt-4">
    <h2>Editar Producto</h2>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ $producto->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control" step="0.01" value="{{ $producto->precio }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen actual</label><br>
            @if($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" width="100">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Cambiar Imagen (opcional)</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Producto</button>
        <a href="{{ route('admin.home') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
