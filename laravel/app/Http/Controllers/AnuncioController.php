<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anuncio;

class AnuncioController extends Controller
{
    // METODO PARA ACCEDER A LA PAGINA PARA VER TODOS LOS ANUNCIOS
    public function index() {
        $anuncios = Anuncio::all();
        return view('admin.anuncios.index', compact('anuncios'));
    }

    // METODO PARA ACCEDER A LA PAGINA DE CREAR UN ANUNCIO
    public function create() {
        return view('admin.anuncios.create');
    }

    // METODO PARA GUARDAR UN NUEVO ANUNCIO EN LA BBDD
    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required|max:255',
            'mensaje' => 'required',
            'fecha' => 'nullable|date',
            'dia_semana' => 'nullable|integer|between:0,6',
            'inicio' => 'nullable|date_format:H:i',
            'fin' => 'nullable|date_format:H:i|after:inicio',
        ]);

        $anuncio = Anuncio::create($request->all());

        $this->updatedActivity($anuncio);

        return redirect()->route('anuncios.index')->with('success', 'Anuncio creado correctamente.');
    }

    // METODO PARA ENVIAR LOS ANUNCIOS POR TELEGRAM
    public function updatedActivity($anuncio) {

        $text = "<b>NUEVA PROMOCIÓN</b>\n";
        $text .= "<b>" . $anuncio->titulo . "</b>\n";
        $text .= "<b>Condiciones:</b> " . $anuncio->mensaje . "\n";

        if ($anuncio->fecha) {
            // Promoción de un día específico
            $text .= "<b>Promoción disponible durante el:</b> " . date('d/m/Y', strtotime($anuncio->fecha)) . "\n";
        } elseif ($anuncio->dia_semana !== null && $anuncio->inicio && $anuncio->fin) {
            // Promoción recurrente
            $dias = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
            $text .= "Promoción válida todos los <b>" . ucfirst($dias[$anuncio->dia_semana]) . "</b>\n";
            $text .= "Desde las " . date('H:i', strtotime($anuncio->inicio)) . " hasta las " . date('H:i', strtotime($anuncio->fin)) . "\n";
        }

        \Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => $text
        ]);
}

    // METODO PARA ACCEDER A LA PAGINA DE EDITAR UN ANUNCIO
    public function edit(Anuncio $anuncio) {
        return view('admin.anuncios.edit', compact('anuncio'));
    }

    // METODO PARA EDITAR UN ANUNCIO
    public function update(Request $request, Anuncio $anuncio) {
        $request->validate([
            'titulo' => 'required|max:255',
            'mensaje' => 'required',
            'fecha' => 'nullable|date',
            'dia_semana' => 'nullable|integer|between:0,6',
            'inicio' => 'nullable|date_format:H:i',
            'fin' => 'nullable|date_format:H:i|after:inicio',
        ]);
    
        $anuncio->update($request->all());
    
        $this->updatedActivity($anuncio);
    
        return redirect()->route('anuncios.index')->with('success', 'Anuncio actualizado correctamente.');
    }
    
    // METODO PARA ELIMINAR UN ANUNCIO
    public function destroy(Anuncio $anuncio) {
        $anuncio->delete();
        return redirect()->route('anuncios.index')->with('success', 'Anuncio eliminado correctamente.');
    }
}
