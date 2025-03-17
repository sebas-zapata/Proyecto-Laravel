<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::paginate(5);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required', // ✅ Validamos que la descripción sea obligatoria
            'precio' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id); // Busca el producto o lanza un error 404
        return view('productos.detalle', compact('producto')); // Retorna la vista con el producto
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required', // ✅ Validamos la descripción
            'precio' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function confirmarEliminacion(Producto $producto)
    {
        return view('productos.eliminar', compact('producto')); // ✅ CORRECTO

    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
