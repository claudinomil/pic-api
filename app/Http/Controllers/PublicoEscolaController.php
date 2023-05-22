<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use Illuminate\Http\Request;
use App\Models\PublicoEscola;

class PublicoEscolaController extends Controller
{
    private $publico_escola;

    public function __construct(PublicoEscola $publico_escola)
    {
        $this->publico_escola = $publico_escola;
    }

    public function store(Request $request)
    {
        $this->publico_escola->create($request->all());

        return response()->json(ApiReturn::data('Registro criado com sucesso.', 2010, null, null), 201);
    }
}
