<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anuncio;

class AnuncioController extends Controller
{
    public function index() {
        $anuncios = Anuncio::all();
        return view('admin.anuncios.index', compact('anuncios'));
    }

    public function create() {
        return view('admin.anuncios.create');
    }

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

    public function updatedActivity($anuncio) {

        $text = "<b>NOVEDAD</b>\n";
        $text .= "<b>Título:</b> " . $anuncio->titulo . "\n";
        $text .= "<b>Mensaje:</b> " . $anuncio->mensaje . "\n";

        if ($anuncio->dia_semana !== null) {
            // Anuncio recurrente
            $dias = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
            $text .= "<b>Se repite cada:</b> " . ucfirst($dias[$anuncio->dia_semana]) . "\n";
            $text .= "<b>Hora de inicio:</b> " . date('H:i', strtotime($anuncio->inicio)) . "\n";
            $text .= "<b>Hora de fin:</b> " . date('H:i', strtotime($anuncio->fin)) . "\n";
        } else {
            // Anuncio esporádico
            $text .= "<b>Fecha Inicio:</b> " . date('d-m-Y H:i', strtotime($anuncio->inicio)) . "\n";
            $text .= "<b>Fecha Fin:</b> " . date('d-m-Y H:i', strtotime($anuncio->fin)) . "\n";
        }

        \Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => $text
        ]);
}

    public function edit(Anuncio $anuncio) {
        return view('admin.anuncios.edit', compact('anuncio'));
    }

    public function update(Request $request, Anuncio $anuncio) {
        $request->validate([
            'titulo' => 'required|max:255',
            'mensaje' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $anuncio->update($request->all());

        return redirect()->route('anuncios.index')->with('success', 'Anuncio actualizado correctamente.');
    }

    public function destroy(Anuncio $anuncio) {
        $anuncio->delete();
        return redirect()->route('anuncios.index')->with('success', 'Anuncio eliminado correctamente.');
    }
}
