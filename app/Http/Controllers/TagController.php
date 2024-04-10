<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::create([
            'nombre' => $request->input('name')
        ]);

        return redirect()->route('tags.index')
            ->with('success', 'Etiqueta creada exitosamente.');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
    ]);

    $tag = Tag::findOrFail($id);
    $tag->update([
        'nombre' => $request->name, // Cambiar 'name' a 'nombre'
    ]);

    return redirect()->route('tags.index')
        ->with('success', 'Etiqueta actualizada exitosamente.');
}


    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')
            ->with('success', 'Etiqueta eliminada exitosamente.');
    }
}
