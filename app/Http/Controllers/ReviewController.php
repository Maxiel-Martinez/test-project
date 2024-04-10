<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product')->latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::all();
        return view('reviews.create', compact('products'));
    }

    public function edit(Review $review)
    {
        $products = Product::all();
        return view('reviews.edit', compact('review', 'products'));
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
    
        // Crear una nueva instancia de Review
        $review = new Review();
    
        // Llenar los datos de la reseña
        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        $review->product_id = $request->input('product_id');
    
        // Guardar la reseña en la base de datos
        $review->save();
    
        // Redirigir al usuario a la página de índice de revisiones
        return redirect()->route('reviews.index');
    }
    
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos del formulario
    
        // Buscar la revisión a actualizar
        $review = Review::findOrFail($id);
    
        // Actualizar los datos de la reseña
        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        $review->product_id = $request->input('product_id');
    
        // Guardar los cambios en la base de datos
        $review->save();
    
        // Redirigir al usuario a la página de índice de revisiones
        return redirect()->route('reviews.index');
    }
    
    
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function destroy(Review $review)
    {
        // Eliminar la revisión
        $review->delete();

        // Redirigir a la página de índice de reseñas con un mensaje de éxito
        return redirect()->route('reviews.index')->with('success', 'Reseña eliminada exitosamente.');
    }
}
