@extends('layouts.main')
@section('content')
<h1>Esta es la vista del menú</h1>
<a href="{{ route('admin.home') }}" class="btn btn-primary ms-5">Administrador</a>
@endsection