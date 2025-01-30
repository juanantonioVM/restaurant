<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen'];

    public function categorias() {
        return $this->belongsToMany(Category::class, 'relation', 'product_id', 'category_id');
    }
}
