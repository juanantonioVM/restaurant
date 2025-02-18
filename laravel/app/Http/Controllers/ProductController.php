<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        // METODO PARA ACCEDER A LA PAGINA DE INICIO DEL ADMINISTRADOR
        public function admin() {
                return view('admin.adminHome');
        }

        // METODO PARA ACCEDER A LA PAGINA PARA VER TODOS LOS PRODUCTOS
        public function verProductos() {
                $categorias = Category::with('productos')->get();
                return view('admin.adminCarta', compact('categorias'));
        }

        // METODO PARA ACCEDER A LA PAGINA PARA GUARDAR TODOS LOS PRODUCTOS
        public function create() {
                $categorias = Category::all();
                return view('admin.productos.create', compact('categorias'));
        }

        // METODO PARA GUARDAR UN PRODUCTO
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

                $producto->category_id = $request->categorias[0];

                $producto->save();
        
                return redirect()->route('admin.productos')->with('success', 'Producto creado correctamente.');
        }
        
        // METODO PARA ACCEDER A LA PAGINA PARA EDITAR TODOS LOS PRODUCTOS
        public function edit(Product $producto) {
                $categorias = Category::all();
                return view('admin.productos.edit', compact('producto', 'categorias'));
        }

        // METODO PARA EDITAR UN PRODUCTO
        public function update(Request $request, Product $producto) {
                $request->validate([
                        'nombre' => 'required|max:150',
                        'descripcion' => 'required|max:255',
                        'precio' => 'required|numeric',
                        'imagen' => 'nullable|image|max:2048',
                        'category_id' => 'required|exists:categories,id',
                ]);
        
                $producto->nombre = $request->nombre;
                $producto->descripcion = $request->descripcion;
                $producto->precio = $request->precio;
        
                if ($request->hasFile('imagen')) {
                        $producto->imagen = $request->file('imagen')->store('productos', 'public');
                }
        
                $producto->category_id = $request->category_id;

                $producto->save();
        
                return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
        }

        // METODO PARA ELIMINAR UN PRODUCTO
        public function destroy(Product $producto) {
                $producto->delete();
                return redirect()->route('admin.productos')->with('success', 'Producto eliminado correctamente.');
        }
}
