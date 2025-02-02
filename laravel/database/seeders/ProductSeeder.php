<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'Bebidas' => Category::where('nombre', 'Bebidas')->first(),
            'Entrantes' => Category::where('nombre', 'Entrantes')->first(),
            'Platos principales' => Category::where('nombre', 'Platos principales')->first(),
            'Postres' => Category::where('nombre', 'Postres')->first(),
        ];

        if (in_array(null, $categorias)) {
            $this->command->info('Error: Algunas categorías no existen. Asegúrate de ejecutar primero el CategorySeeder.');
            return;
        }

        $productos = [
            // Bebidas
            ['nombre' => 'Coca-Cola', 'descripcion' => 'Bebida gaseosa refrescante', 'precio' => 2.50, 'imagen' => 'productos/cocacola.jpg', 'categoria' => 'Bebidas'],
            ['nombre' => 'Fanta de Naranja', 'descripcion' => 'Bebida gaseosa refrescante', 'precio' => 2.50, 'imagen' => 'productos/fanta.jpg', 'categoria' => 'Bebidas'],
            ['nombre' => 'Agua', 'descripcion' => 'Mineral', 'precio' => 1.50, 'imagen' => 'productos/agua.jpg', 'categoria' => 'Bebidas'],

            // Entrantes
            ['nombre' => 'Bruschetta', 'descripcion' => 'Pan tostado con tomate y albahaca', 'precio' => 4.50, 'imagen' => 'productos/bruschetta.jpg', 'categoria' => 'Entrantes'],
            ['nombre' => 'Croquetas Caseras', 'descripcion' => 'Crujientes croquetas de jamón', 'precio' => 5.50, 'imagen' => 'productos/croquetas.jpeg', 'categoria' => 'Entrantes'],
            ['nombre' => 'Ensalada César', 'descripcion' => 'Lechuga con pollo y aderezo César', 'precio' => 6.00, 'imagen' => 'productos/cesar.jpg', 'categoria' => 'Entrantes'],

            // Platos principales
            ['nombre' => 'Pizza Margarita', 'descripcion' => 'Pizza con tomate, mozzarella y albahaca', 'precio' => 10.50, 'imagen' => 'productos/pizza.jpg', 'categoria' => 'Platos principales'],
            ['nombre' => 'Hamburguesa Clásica', 'descripcion' => 'Hamburguesa con queso y lechuga', 'precio' => 9.00, 'imagen' => 'productos/burguer.jpg', 'categoria' => 'Platos principales'],
            ['nombre' => 'Pasta Carbonara', 'descripcion' => 'Pasta con salsa de nata y bacon', 'precio' => 9.50, 'imagen' => 'productos/carbonara.jpg', 'categoria' => 'Platos principales'],

            // Postres
            ['nombre' => 'Tarta de Chocolate', 'descripcion' => 'Delicioso pastel de chocolate', 'precio' => 6.00, 'imagen' => 'productos/tarta.jpg', 'categoria' => 'Postres'],
            ['nombre' => 'Helado de Vainilla', 'descripcion' => 'Helado cremoso de vainilla', 'precio' => 4.00, 'imagen' => 'productos/helado.jpg', 'categoria' => 'Postres'],
            ['nombre' => 'Flan Casero', 'descripcion' => 'Flan con caramelo', 'precio' => 3.50, 'imagen' => 'productos/flan.jpg', 'categoria' => 'Postres'],
        ];

        foreach ($productos as $producto) {
            $nuevoProducto = Product::create([
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
            ]);

            $categoria = $categorias[$producto['categoria']];
            $nuevoProducto->categories()->attach($categoria->id);
        }
    }
}
