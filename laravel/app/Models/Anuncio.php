<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Anuncio extends Model
{
    use HasFactory;

    // CAMPOS DE LA TABLA ANUNCIOS
    protected $fillable = ['titulo', 'mensaje', 'fecha', 'inicio', 'fin', 'dia_semana', 'activo'];

    public function scopeActivos(Builder $q) {
        return $q   ->where('activo', '1');
    }
}
