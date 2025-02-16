<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            ['nombre' => 'Hamburguesas'],
            ['nombre' => 'Entrantes'],
            ['nombre' => 'Zona vegana'],
            ['nombre' => 'Infantil'],
            ['nombre' => 'Postres'],
            ['nombre' => 'Cervezas'],
            ['nombre' => 'Café y té'],
            ['nombre' => 'Bebidas'],
        ];

        foreach ($categorias as $categoria) {
            Category::create($categoria);
        }
    }
}
