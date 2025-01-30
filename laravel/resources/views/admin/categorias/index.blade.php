@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <h2>Gestión de Categorías</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Crear Categoría</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->nombre }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <a href="javascript: document.getElementById('delete-{{$category->id}}').submit()" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar esta categoría?')">Eliminar</a>
                    <form id="delete-{{$category->id}}" action="{{ route('categorias.destroy', $category->id) }}" method="POST" class="d-inline">
                        @method('delete')    
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
