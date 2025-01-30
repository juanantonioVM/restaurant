@extends('layouts.mainAdmin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 py-4">
            <div class="card"  style="width: 500px;">
                <img src="{{ asset('images/banners/chef.jpg') }}" alt="Productos" class="rounded">
                    <div class="card-img-overlay">
                    <a href="{{ route('admin.productos') }}" class="btn btn-success d-grid">Ver productos</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 py-4">
            <div class="card"  style="width: 500px;">
                <img src="{{ asset('images/banners/productos.jpg') }}" alt="Productos" class="rounded">
                    <div class="card-img-overlay">
                    <a href="{{ route('categorias.index') }}" class="btn btn-success d-grid">Ver categorías</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection