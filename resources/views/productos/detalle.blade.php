@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-secondary text-white text-center fs-4 rounded-top-4">
            <i class="bi bi-box-seam"></i> Detalles del Producto
        </div>
        <div class="card-body text-center">
            <h5 class="card-title fw-bold">{{$producto->nombre}}</h5>

            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item"><strong>ID:</strong> {{$producto->id}}</li>
                <li class="list-group-item"><strong>Descripción:</strong> {{$producto->descripcion}}</li>
                <li class="list-group-item"><strong>Precio:</strong> ${{$producto->precio}}</li>
                <li class="list-group-item"><strong>Stock disponible:</strong> {{$producto->stock}}</li>
            </ul>
            <div class="d-flex justify-content-center gap-2">
                <a class="btn btn-secondary" href="{{ route('productos.index') }}"><i class="bi bi-arrow-left"></i></a>
                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary"><i class="bi bi-pencil-square me-2"></i></a>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar este producto?')"> <i class="bi bi-trash-fill me-2"></i></button>
                </form>
            </div>
        </div>
        <div class="card-footer text-center bg-light rounded-bottom-4">
            <small class="text-muted">Fecha de creacion: {{$producto->created_at}}</small> |
            <small class="text-muted">Última actualización: {{$producto->updated_at}}</small>
        </div>
    </div>
</div>

@endsection