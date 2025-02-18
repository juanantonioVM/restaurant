<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Anuncio;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {

    // METODO PARA ACCEDER A LA PAGINA PARA VER TODAS LAS CATEGORIAS
    public function index() {
        $categorias = Category::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    // METODO PARA ACCEDER A LA PAGINA PARA CREAR UNA CATEGORIA
    public function create() {
        return view('admin.categorias.create');
    }

    // METODO PARA GUARDAR UNA NUEVA CATEGORIA EN LA BASE DE DATOS
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:categories,nombre',
        ]);

        Category::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    // METODO PARA ACCEDER A LA PAGINA PARA EDITAR UNA CATEGORIA
    public function edit($id) {
        $categoria = Category::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    // METODO PARA EDITAR UNA CATEGORIA
    public function update(Request $request, $id) {
        $categoria = Category::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    // METODO PARA ELIMINAR UNA CATEGORIA
    public function destroy(Category $category) {
        $category->productos()->delete();
        $category->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }

    // METODO PARA VER LA VISTA PUBLICA, CON UNA CONSULTA PARA RECOGER LO PASADO POR EL INPUT DEL BUSCADOR, Y CON OTRA PARA MOSTRAR TODOS LOS ANUNCIOS ACTIVOS
    public function vistaPubli(Request $request) {
        $query = $request->input('search');
    
        $categorias = Category::with(['productos' => function ($q) use ($query) {
            if ($query) {
                $q->where('nombre', 'like', "%{$query}%");
            }
        }])->get();

        $anuncios = Anuncio::where('activo', '1')->get();
    
        return view('menu.index', compact('categorias', 'query', 'anuncios'));
    }
}
