<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Http\Requests\TurmaStoreRequest;
use App\Http\Requests\TurmaUpdateRequest;
use App\Models\Escola;
use App\Models\NivelEnsino;
use App\Models\Professor;
use App\Models\Turma;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    private $turma;

    public function __construct(Turma $turma)
    {
        $this->turma = $turma;
    }

    public function index()
    {
        $registros = DB::table('turmas')
            ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
            ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
            ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
            ->select(['turmas.*', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
            ->get();

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, null, $registros), 200);
    }

    public function show($id)
    {
        try {
            $registro = $this->turma->find($id);

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

    public function auxiliary()
    {
        try {
            $registros = array();

            //Escolas
            $registros['escolas'] = Escola::all();

            //Niveis Ensino
            $registros['niveis_ensinos'] = NivelEnsino::all();

            //Professores
            $registros['professores'] = Professor::all();

            return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $registros), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function store(TurmaStoreRequest $request)
    {
        try {
            //Preparando request
            $data = $request->all();

            //Campo foto
            $data['foto'] = 'build/assets/images/turmas/turma-0.png';

            //Incluindo registro
            $this->turma->create($data);

            return response()->json(ApiReturn::data('Registro criado com sucesso.', 2010, null, null), 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function update(TurmaUpdateRequest $request, $id)
    {
        try {
            $registro = $this->turma->find($id);

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
            } else {
                //Preparando request
                $data = $request->all();

                //Alterando registro
                $registro->update($data);

                return response()->json(ApiReturn::data('Registro atualizado com sucesso.', 2000, null, $registro), 200);
            }
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $registro = $this->turma->find($id);

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, $registro), 404);
            } else {
                //Verificar Relacionamentos'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
                //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

                //Deletar'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
                $registro->delete();

                return response()->json(ApiReturn::data('Registro excluído com sucesso.', 2000, null, null), 200);
                //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            }
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function search($field, $value)
    {
        $registros = DB::table('turmas')
            ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
            ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
            ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
            ->select(['turmas.*', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
            ->where($field, 'like', '%' . $value . '%')
            ->get();

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, null, $registros), 200);
    }

    public function research($fieldSearch, $fieldValue, $fieldReturn)
    {
        $registros = DB::table('turmas')
            ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
            ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
            ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
            ->select(['turmas.*', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
            ->where($fieldSearch, 'like', '%' . $fieldValue . '%')
            ->get($fieldReturn);

        return response()->json(ApiReturn::data('', 2000, null, $registros), 200);
    }
}
