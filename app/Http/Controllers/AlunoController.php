<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Http\Requests\AlunoStoreRequest;
use App\Http\Requests\AlunoUpdateRequest;
use App\Models\Genero;
use App\Models\Turma;
use App\Models\Raca;
use App\Models\Nacionalidade;
use App\Models\Naturalidade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aluno;

class AlunoController extends Controller
{
    private $aluno;

    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    public function index()
    {
        $registros = DB::table('alunos')
            ->leftJoin('generos', 'alunos.genero_id', '=', 'generos.id')
            ->leftJoin('racas', 'alunos.raca_id', '=', 'racas.id')
            ->leftJoin('turmas', 'alunos.turma_id', '=', 'turmas.id')
            ->select(['alunos.*', 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName'])
            ->get();

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, null, $registros), 200);
    }

    public function show($id)
    {
        try {
            $registro = $this->aluno->find($id);

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

            //Gêneros
            $registros['generos'] = Genero::all();

            //Racas
            $registros['racas'] = Raca::all();

            //Turmas
            $registros['turmas'] = DB::table('turmas')
                ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
                ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
                ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
                ->select(['turmas.*', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
                ->get();

            //Nacionalidades
            $registros['nacionalidades'] = Nacionalidade::all();

            //Naturalidades
            $registros['naturalidades'] = Naturalidade::all();

            return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $registros), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function store(AlunoStoreRequest $request)
    {
        try {
            //Preparando request
            $data = $request->all();

            if ($request['data_nascimento'] != '') {$data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request['data_nascimento'])->format('Y-m-d');}

            //Campo foto
            $data['foto'] = 'build/assets/images/alunos/aluno-0.png';

            //Incluindo registro
            $this->aluno->create($data);

            return response()->json(ApiReturn::data('Registro criado com sucesso.', 2010, null, null), 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function update(AlunoUpdateRequest $request, $id)
    {
        try {
            $registro = $this->aluno->find($id);

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
            } else {
                //Preparando request
                $data = $request->all();

                if ($request['data_nascimento'] != '') {$data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request['data_nascimento'])->format('Y-m-d');}

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

    public function extraData($id)
    {
        try {
            $registro = array();

            //Aluno
            $aluno = DB::table('alunos')
                ->leftJoin('generos', 'alunos.genero_id', '=', 'generos.id')
                ->leftJoin('racas', 'alunos.raca_id', '=', 'racas.id')
                ->leftJoin('turmas', 'alunos.turma_id', '=', 'turmas.id')
                ->select(['alunos.*', 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName'])
                ->where('alunos.id', '=', $id)
                ->get();

            $registro['aluno'] = $aluno[0];

            //Transacoes
            $transacoes = ['Transação 1', 'Transação 2', 'Transação 3'];

            $registro['transacoesTable']['transacoes'] = $transacoes;

            return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $registro), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function updateFoto(Request $request, $id)
    {
        try {
            $registro = $this->aluno->find($id);

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
            } else {
                //Alterando registro
                $registro->update($request->all());

                return response()->json(ApiReturn::data('Foto atualizada com sucesso.', 2000, null, $registro), 200);
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
            $registro = $this->aluno->find($id);

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
        $registros = DB::table('alunos')
            ->leftJoin('generos', 'alunos.genero_id', '=', 'generos.id')
            ->leftJoin('racas', 'alunos.raca_id', '=', 'racas.id')
            ->leftJoin('turmas', 'alunos.turma_id', '=', 'turmas.id')
            ->select(['alunos.*', 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName'])
            ->where($field, 'like', '%' . $value . '%')
            ->get();

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, null, $registros), 200);
    }

    public function research($fieldSearch, $fieldValue, $fieldReturn)
    {
        $registros = DB::table('alunos')
            ->leftJoin('generos', 'alunos.genero_id', '=', 'generos.id')
            ->leftJoin('racas', 'alunos.raca_id', '=', 'racas.id')
            ->leftJoin('turmas', 'alunos.turma_id', '=', 'turmas.id')
            ->select(['alunos.*', 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName'])
            ->where($fieldSearch, 'like', '%' . $fieldValue . '%')
            ->get($fieldReturn);

        return response()->json(ApiReturn::data('', 2000, null, $registros), 200);
    }
}
