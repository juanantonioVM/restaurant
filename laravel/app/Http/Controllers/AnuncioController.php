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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $anuncio = Anuncio::create($request->all());

        $this->updatedActivity($anuncio);

        return redirect()->route('anuncios.index')->with('success', 'Anuncio creado correctamente.');
    }

    public function updatedActivity($anuncio) {

        $text = "<b>NOVEDAD</b>\n";
        $text .= "<b>Título:</b> " . $anuncio->titulo . "\n";
        $text .= "<b>Mensaje:</b> " . $anuncio->mensaje . "\n";
        $text .= "<b>Fecha Inicio:</b> " . $anuncio->fecha_inicio . "\n";
        $text .= "<b>Fecha Fin:</b> " . $anuncio->fecha_fin . "\n";

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
