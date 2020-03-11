<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tema;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function listarHilos(Request $request) {

        $rawQuery = 'SELECT
            (SELECT name from users WHERE users.id = users.id) as "nombre",
            (
                SELECT
                    count(id)
                FROM
                    temas
                WHERE
                    temas.idAutor = users.id
            ) AS "numerotemas",
            (
                SELECT
                    count(id)
                FROM
                    mensajes
                WHERE
                    mensajes.idAutor = users.id
            ) AS "numeromensajes"
        FROM
            users
        GROUP BY
            users.id;';

        $stats =  DB::select(DB::raw($rawQuery));

        return(view("inicio", ['temas' => Tema::all(), 'stats' => $stats]));

    }
}
