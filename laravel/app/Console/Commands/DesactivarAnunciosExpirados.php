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
        Anuncio::whereDate('fecha_fin', '<', now())->delete();
        $this->info('Anuncios expirados eliminados.');

    }
}
