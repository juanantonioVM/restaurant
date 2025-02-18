@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <h2 class="fuente-personalizada-titulo">Categorias</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-success mb-3">Crear Categoría</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $category)
            <tr>
                <td>{{ $category->nombre }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('categorias.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mt-2 mt-xl-0">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
