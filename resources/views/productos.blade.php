@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Lista de Productos</h1>

        <a href="{{ route('productos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Agregar Producto
        </a>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Precio</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr class="border-b border-gray-200">
                            <td class="py-3 px-6 text-left">{{ $producto->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $producto->nombre }}</td>
                            <td class="py-3 px-6 text-left">${{ number_format($producto->precio, 2) }}</td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="text-yellow-500 hover:text-yellow-700">Editar</a>
                                |
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
