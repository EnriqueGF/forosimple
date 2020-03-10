<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ChrisKonnertz\BBCode\BBCode;
use App\Tema;
use App\Mensaje;
use Illuminate\Support\Facades\Auth;


class TemasController extends Controller
{
    public function crearTemaView(Request $request) {
        return(view("temas.creartema"));
    }
    public function verTema(Request $request, $idTema) {
        $bbcode = new BBCode();
        $tema = Tema::where('id', $idTema)->first();
        $mensajes = Mensaje::where('idTema', $idTema)->get();
        $rendered = $bbcode->render($tema->mensaje);

        return(view("temas.vertema", ['tema' => $tema, 'mensajes' => $mensajes, 'mensaje' => $rendered]));

    }
    public function crearTema(Request $request) {

        $validatedData = $request->validate([
            'titulo' => 'required|max:50',
            'mensaje' => 'required|max:1000',
        ]);

        $bbcode = new BBCode();
        $rendered = $bbcode->render($request->mensaje);

        $tema = new Tema;
        $tema->titulo = $request->titulo;
        $tema->idAutor = Auth::id();
        $tema->mensaje = $request->mensaje;
        $tema->save();

        return(redirect(route('inicio'))->with('success', 'Tema creado correctamente.'));
    }

    public function responderTema(Request $request, $idTema) {

        $validatedData = $request->validate([
            'mensaje' => 'required|max:1000',
        ]);

        $mensaje = new Mensaje;
        $mensaje->idAutor = Auth::id();
        $mensaje->idTema = $idTema;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->save();

        return(redirect()->back());
    }

}
