<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Http\Requests\SobreProdutoUpdateRequest;
use App\Models\SobreProduto;

class SobreProdutoController extends Controller
{
    private $sobre_produto;

    public function __construct(SobreProduto $sobre_produto)
    {
        $this->sobre_produto = $sobre_produto;
    }

    public function show($id)
    {
        try {
            $registro = $this->sobre_produto->find($id);

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
            } else {
                return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $registro), 200);
            }
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function update(SobreProdutoUpdateRequest $request, $id)
    {
        try {
            $registro = $this->sobre_produto->find($id);

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
            } else {
                //Alterando registro
                $registro->update($request->all());

                return response()->json(ApiReturn::data('Registro atualizado com sucesso.', 2000, null, $registro), 200);
            }
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }
}
