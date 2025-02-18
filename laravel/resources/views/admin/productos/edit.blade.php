@extends('layouts.mainAdmin')
@section('content')
<div class="container mt-4">
    <h2 class="fuente-personalizada-titulo">Editar Producto</h2>

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
            <label class="form-label">Cambiar Imagen</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Cambiar de categoría</label>
            <select name="category_id" class="form-select">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                        @if($producto->category_id == $categoria->id) selected @endif>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Actualizar Producto</button>
        <a href="{{ route('admin.productos') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
