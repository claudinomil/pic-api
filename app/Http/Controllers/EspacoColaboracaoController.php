<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Http\Requests\EspacoColaboracaoStoreRequest;
use App\Http\Requests\EspacoColaboracaoUpdateRequest;
use App\Models\Aluno;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\EspacoColaboracao;

class EspacoColaboracaoController extends Controller
{
    private $espaco_colaboracao;

    public function __construct(EspacoColaboracao $espaco_colaboracao)
    {
        $this->espaco_colaboracao = $espaco_colaboracao;
    }

    public function index()
    {
        $registros = $this->espaco_colaboracao
            ->leftJoin('alunos', 'espacos_colaboracoes.aluno_id', '=', 'alunos.id')
            ->leftJoin('professores', 'espacos_colaboracoes.professor_id', '=', 'professores.id')
            ->select(['espacos_colaboracoes.*', 'alunos.name as alunoName', 'professores.name as professorName'])
            ->get();

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, null, $registros), 200);
    }

    public function show($id)
    {
        try {
            $registro = $this->espaco_colaboracao->find($id);

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

            //Alunos
            $registros['alunos'] = Aluno::all();

            //Professores
            $registros['professores'] = Professor::all();

            //Alunos x Turmas x Professores
            $registros['alunos_turmas_professores'] = Aluno::leftJoin('turmas', 'alunos.turma_id', '=', 'turmas.id')
                ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
                ->select('alunos.id as alunoId', 'alunos.name as alunoName', 'turmas.id as turmaId', 'turmas.name as turmaName', 'professores.id as professorId', 'professores.name as professorName')
                ->get();

            return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $registros), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function store(EspacoColaboracaoStoreRequest $request)
    {
        try {
            //Incluindo registro
            $this->espaco_colaboracao->create($request->all());

            return response()->json(ApiReturn::data('Registro criado com sucesso.', 2010, null, null), 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function update(EspacoColaboracaoUpdateRequest $request, $id)
    {
        try {
            $registro = $this->espaco_colaboracao->find($id);

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

    public function destroy($id)
    {
        try {
            $registro = $this->espaco_colaboracao->find($id);

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
        $registros = DB::table('espacos_colaboracoes')
            ->select(['espacos_colaboracoes.*'])
            ->where($field, 'like', '%' . $value . '%')
            ->get();

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, null, $registros), 200);
    }

    public function research($fieldSearch, $fieldValue, $fieldReturn)
    {
        $registros = DB::table('espacos_colaboracoes')
            ->select(['espacos_colaboracoes.*'])
            ->where($fieldSearch, 'like', '%' . $fieldValue . '%')
            ->get($fieldReturn);

        return response()->json(ApiReturn::data('', 2000, null, $registros), 200);
    }
}
