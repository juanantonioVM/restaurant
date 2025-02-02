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
            ['nombre' => 'Bebidas'],
            ['nombre' => 'Entrantes'],
            ['nombre' => 'Platos principales'],
            ['nombre' => 'Postres'],
        ];

        foreach ($categorias as $categoria) {
            Category::create($categoria);
        }
    }
}
