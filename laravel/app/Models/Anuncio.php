<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'mensaje', 'fecha_inicio', 'fecha_fin'];

    public function scopeActivos(Builder $q) {

        return $q   ->whereDate('fecha_inicio', '<=', now())
                    ->whereDate('fecha_fin', '>=', now());
    }
}
