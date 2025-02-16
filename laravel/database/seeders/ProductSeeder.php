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
            // Hamburguesas
            ['nombre' => 'Cheeseburger', 'descripcion' => 'Carne de ternera, queso cheddar, lechuga, tomate y salsa especial.', 'precio' => 10.50, 'imagen' => 'productos/cheeseburger.jpg', 'categoria' => 'Hamburguesas'],
            ['nombre' => 'Smash Burger', 'descripcion' => 'Doble carne de ternera, cebolla caramelizada, queso cheddar y mayonesa.', 'precio' => 12.00, 'imagen' => 'productos/smash.jpg', 'categoria' => 'Hamburguesas'],
            ['nombre' => 'BBQ Burger', 'descripcion' => 'Carne de ternera, bacon crujiente, queso cheddar y salsa BBQ.', 'precio' => 11.50, 'imagen' => 'productos/bbq.jpg', 'categoria' => 'Hamburguesas'],
            ['nombre' => 'Trufada', 'descripcion' => 'Carne de ternera, queso brie, rúcula y mayonesa de trufa.', 'precio' => 13.00, 'imagen' => 'productos/trufada.png', 'categoria' => 'Hamburguesas'],
            ['nombre' => 'Tex-Mex Burger', 'descripcion' => 'Carne de ternera, guacamole, jalapeños y pico de gallo.', 'precio' => 12.50, 'imagen' => 'productos/texmex.jpg', 'categoria' => 'Hamburguesas'],
            ['nombre' => 'Doble Bacon Cheese', 'descripcion' => 'Doble carne, doble bacon y doble cheddar.', 'precio' => 14.00, 'imagen' => 'productos/doblebacon.jpg', 'categoria' => 'Hamburguesas'],
        
            // Entrantes
            ['nombre' => 'Patatas Bravas', 'descripcion' => 'Patatas fritas con salsa brava y alioli.', 'precio' => 6.50, 'imagen' => 'productos/bravas.jpg', 'categoria' => 'Entrantes'],
            ['nombre' => 'Aros de Cebolla', 'descripcion' => 'Aros de cebolla crujientes con salsa barbacoa.', 'precio' => 5.50, 'imagen' => 'productos/aros.jpg', 'categoria' => 'Entrantes'],
            ['nombre' => 'Nachos con Queso', 'descripcion' => 'Nachos con queso fundido, guacamole y pico de gallo.', 'precio' => 8.00, 'imagen' => 'productos/nachos.jpg', 'categoria' => 'Entrantes'],
            ['nombre' => 'Alitas de Pollo', 'descripcion' => 'Alitas de pollo marinadas y fritas.', 'precio' => 7.50, 'imagen' => 'productos/alitas.jpg', 'categoria' => 'Entrantes'],
            ['nombre' => 'Tiras de Pollo', 'descripcion' => 'Crujientes tiras de pollo rebozadas con salsa de miel y mostaza.', 'precio' => 7.00, 'imagen' => 'productos/tiras.jpg', 'categoria' => 'Entrantes'],
            ['nombre' => 'Gyozas', 'descripcion' => 'Empanadillas japonesas rellenas de pollo y verduras.', 'precio' => 6.00, 'imagen' => 'productos/gyozas.jpg', 'categoria' => 'Entrantes'],
        
            // Zona vegana
            ['nombre' => 'Hamburguesa Vegana', 'descripcion' => 'Hamburguesa de soja con lechuga, tomate y mayonesa vegana.', 'precio' => 11.00, 'imagen' => 'productos/burguervegana.jpg', 'categoria' => 'Zona vegana'],
            ['nombre' => 'Falafel', 'descripcion' => 'Bolitas de garbanzo con salsa de yogur.', 'precio' => 8.00, 'imagen' => 'productos/falafel.jpg', 'categoria' => 'Zona vegana'],
            ['nombre' => 'Ensalada de Quinoa', 'descripcion' => 'Quinoa con aguacate, tomate y vinagreta.', 'precio' => 9.00, 'imagen' => 'productos/quinoa.jpg', 'categoria' => 'Zona vegana'],
            ['nombre' => 'Bowl de Tofu', 'descripcion' => 'Tofu marinado con arroz y verduras.', 'precio' => 9.50, 'imagen' => 'productos/tofu.jpg', 'categoria' => 'Zona vegana'],
            ['nombre' => 'Pasta Pesto Vegana', 'descripcion' => 'Pasta con pesto de albahaca sin queso.', 'precio' => 10.00, 'imagen' => 'productos/pesto.jpg', 'categoria' => 'Zona vegana'],
            ['nombre' => 'Tacos Veganos', 'descripcion' => 'Tacos rellenos de proteína vegetal y verduras.', 'precio' => 10.50, 'imagen' => 'productos/tacosveganos.jpg', 'categoria' => 'Zona vegana'],
        
            // Infantil
            ['nombre' => 'Nuggets de Pollo', 'descripcion' => 'Nuggets de pollo con patatas.', 'precio' => 6.00, 'imagen' => 'productos/nuggets.jpg', 'categoria' => 'Infantil'],
            ['nombre' => 'Mini Burger', 'descripcion' => 'Mini hamburguesa con queso.', 'precio' => 5.50, 'imagen' => 'productos/miniburger.jpg', 'categoria' => 'Infantil'],
            ['nombre' => 'Mac & Cheese', 'descripcion' => 'Macarrones con queso cremoso.', 'precio' => 6.50, 'imagen' => 'productos/mac.jpg', 'categoria' => 'Infantil'],
            ['nombre' => 'Pizza Infantil', 'descripcion' => 'Mini pizza margarita.', 'precio' => 7.00, 'imagen' => 'productos/pizza_infantil.jpg', 'categoria' => 'Infantil'],
            ['nombre' => 'Sándwich Mixto', 'descripcion' => 'Sándwich de jamón y queso.', 'precio' => 4.50, 'imagen' => 'productos/sandwich.jpg', 'categoria' => 'Infantil'],
            ['nombre' => 'Hot Dog', 'descripcion' => 'Perrito caliente con ketchup y mostaza.', 'precio' => 5.00, 'imagen' => 'productos/hotdog.jpg', 'categoria' => 'Infantil'],
        
            // Postres
            ['nombre' => 'Tarta de Queso', 'descripcion' => 'Tarta de queso casera con frutos rojos.', 'precio' => 6.00, 'imagen' => 'productos/tartaqueso.jpg', 'categoria' => 'Postres'],
            ['nombre' => 'Brownie con Helado', 'descripcion' => 'Brownie de chocolate con helado de vainilla.', 'precio' => 5.50, 'imagen' => 'productos/brownie.jpg', 'categoria' => 'Postres'],
            ['nombre' => 'Tiramisú', 'descripcion' => 'Postre italiano con mascarpone y café.', 'precio' => 6.50, 'imagen' => 'productos/tiramisu.jpg', 'categoria' => 'Postres'],
            ['nombre' => 'Flan Casero', 'descripcion' => 'Flan con caramelo.', 'precio' => 4.00, 'imagen' => 'productos/flan.jpg', 'categoria' => 'Postres'],
            ['nombre' => 'Helado Variado', 'descripcion' => 'Selección de helados artesanales.', 'precio' => 4.50, 'imagen' => 'productos/helado.jpg', 'categoria' => 'Postres'],
            ['nombre' => 'Crepes', 'descripcion' => 'Crepes rellenos de Nutella.', 'precio' => 5.00, 'imagen' => 'productos/crepes.jpg', 'categoria' => 'Postres'],
        
            // Cervezas
            ['nombre' => 'Mahou', 'descripcion' => 'Cerveza rubia española.', 'precio' => 3.00, 'imagen' => 'productos/mahou.jpg', 'categoria' => 'Cervezas'],
            ['nombre' => 'Heineken', 'descripcion' => 'Cerveza lager premium.', 'precio' => 3.50, 'imagen' => 'productos/heineken.jpg', 'categoria' => 'Cervezas'],
            ['nombre' => 'Estrella Galicia', 'descripcion' => 'Cerveza artesanal gallega.', 'precio' => 3.50, 'imagen' => 'productos/estrella.jpg', 'categoria' => 'Cervezas'],
            ['nombre' => 'Corona', 'descripcion' => 'Cerveza mexicana suave con lima.', 'precio' => 4.00, 'imagen' => 'productos/corona.jpg', 'categoria' => 'Cervezas'],
            ['nombre' => 'Guinness', 'descripcion' => 'Cerveza negra irlandesa con sabor intenso.', 'precio' => 4.50, 'imagen' => 'productos/guinness.jpg', 'categoria' => 'Cervezas'],
            ['nombre' => 'Paulaner', 'descripcion' => 'Cerveza de trigo alemana.', 'precio' => 4.50, 'imagen' => 'productos/paulaner.jpg', 'categoria' => 'Cervezas'],

            // Bebidas
            ['nombre' => 'Agua', 'descripcion' => 'Agua mineral natural.', 'precio' => 1.50, 'imagen' => 'productos/agua.jpg', 'categoria' => 'Bebidas'],
            ['nombre' => 'Coca-Cola', 'descripcion' => 'Refresco de cola original.', 'precio' => 2.50, 'imagen' => 'productos/cocacola.jpg', 'categoria' => 'Bebidas'],
            ['nombre' => 'Fanta Naranja', 'descripcion' => 'Refresco de naranja.', 'precio' => 2.50, 'imagen' => 'productos/fanta.jpg', 'categoria' => 'Bebidas'],
            ['nombre' => 'Aquarius', 'descripcion' => 'Bebida isotónica con sabor a limón.', 'precio' => 2.50, 'imagen' => 'productos/aquarius.jpg', 'categoria' => 'Bebidas'],
            ['nombre' => 'Vino Tinto', 'descripcion' => 'Copa de vino tinto crianza.', 'precio' => 4.00, 'imagen' => 'productos/vinotinto.jpg', 'categoria' => 'Bebidas'],
            ['nombre' => 'Vino Blanco', 'descripcion' => 'Copa de vino blanco afrutado.', 'precio' => 4.00, 'imagen' => 'productos/vinoblanco.jpg', 'categoria' => 'Bebidas'],

            // Café y Té
            ['nombre' => 'Café Solo', 'descripcion' => 'Espresso intenso.', 'precio' => 1.50, 'imagen' => 'productos/cafesolo.jpg', 'categoria' => 'Café y Té'],
            ['nombre' => 'Café con Leche', 'descripcion' => 'Café con leche cremoso.', 'precio' => 1.80, 'imagen' => 'productos/cafeconleche.jpg', 'categoria' => 'Café y Té'],
            ['nombre' => 'Cappuccino', 'descripcion' => 'Espresso con espuma de leche.', 'precio' => 2.50, 'imagen' => 'productos/cappuccino.jpg', 'categoria' => 'Café y Té'],
            ['nombre' => 'Té Verde', 'descripcion' => 'Infusión de té verde antioxidante.', 'precio' => 2.00, 'imagen' => 'productos/teverde.jpg', 'categoria' => 'Café y Té'],
            ['nombre' => 'Té Rojo', 'descripcion' => 'Infusión de té rojo digestivo.', 'precio' => 2.00, 'imagen' => 'productos/terojo.jpg', 'categoria' => 'Café y Té'],
            ['nombre' => 'Manzanilla', 'descripcion' => 'Infusión relajante de manzanilla.', 'precio' => 2.00, 'imagen' => 'productos/manzanilla.jpg', 'categoria' => 'Café y Té'],
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
