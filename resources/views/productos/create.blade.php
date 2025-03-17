@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Precio:</label>
            <input type="number" name="precio" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Stock:</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </form>
</div>
@endsection