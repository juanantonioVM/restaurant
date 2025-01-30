<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index() {
                $productos = Product::all();
                return view('menu.index', compact('productos'));
        }

        public function admin() {
                return view('admin.adminHome');
        }

        public function verProductos() {
                $categorias = Category::with('productos')->get();
                return view('admin.adminCarta', compact('categorias'));
        }

        public function create() {
                $categorias = Category::all();
                return view('admin.productos.create', compact('categorias'));
        }

        public function store(Request $request) {
                $request->validate([
                        'nombre' => 'required|max:150',
                        'descripcion' => 'required|max:255',
                        'precio' => 'required|numeric',
                        'imagen' => 'nullable|image|max:2048',
                        'categorias' => 'required|array',
                        'categorias.*' => 'exists:categories,id',
                ]);
        
                $producto = new Product();
                $producto->nombre = $request->nombre;
                $producto->descripcion = $request->descripcion;
                $producto->precio = $request->precio;
        
                if ($request->hasFile('imagen')) {
                        $producto->imagen = $request->file('imagen')->store('productos', 'public');
                }
        
                $producto->save();
        
                $producto->categorias()->sync($request->categorias);
        
                return redirect()->route('admin.productos')->with('success', 'Producto creado correctamente.');
        }
        

        public function edit(Product $producto) {
                return view('admin.productos.edit', compact('producto'));
        }

        public function update(Request $request, Product $producto) {
                $request->validate([
                        'nombre' => 'required|max:150',
                        'descripcion' => 'required|max:255',
                        'precio' => 'required|numeric',
                        'imagen' => 'nullable|image|max:2048',
                ]);
        
                $producto->nombre = $request->nombre;
                $producto->descripcion = $request->descripcion;
                $producto->precio = $request->precio;
        
                if ($request->hasFile('imagen')) {
                        $producto->imagen = $request->file('imagen')->store('productos', 'public');
                }
        
                $producto->save();
        
                return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
        }

        public function destroy(Product $producto) {
                $producto->delete();
                return redirect()->route('admin.productos')->with('success', 'Producto eliminado correctamente.');
        }
}
