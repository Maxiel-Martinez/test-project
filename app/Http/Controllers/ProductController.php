<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('imagen')->store('public/images');

        Product::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $imagePath,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    // Implementar los métodos edit(), update() y destroy() de manera similar
    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'imagen' => 'image|max:2048',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('imagen')) {
        $imagePath = $request->file('imagen')->store('public/images');
        $product->imagen = $imagePath;
    }

    $product->nombre = $request->nombre;
    $product->descripcion = $request->descripcion;
    $product->precio = $request->precio;
    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Producto actualizado exitosamente.');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')
        ->with('success', 'Producto eliminado exitosamente.');
}
}