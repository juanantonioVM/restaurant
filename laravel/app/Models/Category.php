<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // CAMPO DE LA TABLA CATEGORIAS
    protected $fillable = ['nombre'];

    public function productos() {
        return $this->hasMany(Product::class, 'category_id');
    }
}
