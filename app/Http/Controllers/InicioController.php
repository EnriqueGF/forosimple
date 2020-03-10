<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tema;

class InicioController extends Controller
{
    public function listarHilos(Request $request) {

        return(view("inicio", ['temas' => Tema::all()]));

    }
}
