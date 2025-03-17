@if (!Auth::check())
<script>
    window.location.href = "{{ route('login') }}";
</script>
@endif

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-success m-3"><i class="bi bi-plus-circle"></i></a>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-2" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-bordered mt-3 table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <a class="btn btn-warning m-1" href="{{ route('productos.show', $producto)}}"><i class="bi bi-eye-fill me-2"></i></a>
                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary m-1"><i class="bi bi-pencil-square me-2"></i></a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-1" onclick="return confirm('¿Eliminar este producto?')"> <i class="bi bi-trash-fill me-2"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection