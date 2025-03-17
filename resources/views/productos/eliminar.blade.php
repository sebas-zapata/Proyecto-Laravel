@extends('layouts.app') {{-- O usa tu layout principal --}}

@section('content')
<div class="container mt-5">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Confirmar Eliminación</h4>
        </div>
        <div class="card-body">
            <h5 class="card-text">
                ¿Estás seguro de que deseas eliminar el producto <strong>{{ $producto->nombre }}</strong>?
            </h5>
            <form id="delete-form" action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Eliminar
                </button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
