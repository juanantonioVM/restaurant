<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // CAMPOS DE LA TABLA PRODUCTOS
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen', 'category_id'];

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
