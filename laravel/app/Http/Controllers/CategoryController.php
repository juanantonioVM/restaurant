<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller {
    public function index() {
        $categorias = Category::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create() {
        return view('admin.categorias.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:categories,nombre',
        ]);

        Category::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function edit($id) {
        $categoria = Category::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id) {
        $categoria = Category::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Category $category) {
        $category->productos()->detach();
        $category->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }

    public function vistaPubli(Request $request) {
        $query = $request->input('search');
    
        $categorias = Category::with(['productos' => function ($q) use ($query) {
            if ($query) {
                $q->where('nombre', 'like', "%{$query}%");
            }
        }])->get();
    
        return view('menu.index', compact('categorias', 'query'));
    }
}
