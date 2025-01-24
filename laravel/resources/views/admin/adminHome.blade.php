@extends('layouts.main')
@section('content')
<h1>Esta es la vista de administrador</h1>
<a href="javascript: document.getElementById('logout').submit()" class="btn btn-sm btn-outline-danger">Cerrar Sesión</a>
<form id="logout" action="{{route('logout')}}" method="POST" style="display:none">@csrf</form>
@endsection