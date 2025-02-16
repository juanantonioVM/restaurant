<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Anuncio;

class DesactivarAnunciosExpirados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anuncios:desactivar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Activa anuncios esporádicos
        Anuncio::whereDate('fecha', now())
            ->where('activo', '0')
            ->update(['activo' => '1']);

        // Desactiva anuncios esporádicos
        Anuncio::whereDate('fecha', '<', now())
            ->where('activo', '1')
            ->update(['activo' => '0']);

        // Activa anuncios recurrentes
        Anuncio::where('dia_semana', now()->dayOfWeek)
            ->whereTime('inicio', '<=', now())
            ->whereTime('fin', '>=', now())
            ->where('activo', '0')
            ->update(['activo' => '1']);

        // Desactiva anuncios recurrentes
        Anuncio::where('dia_semana', now()->dayOfWeek)
            ->whereTime('fin', '<', now())
            ->where('activo', '1')
            ->update(['activo' => '0']);
    }
}
