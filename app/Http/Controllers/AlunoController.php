<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Http\Requests\AlunoStoreRequest;
use App\Http\Requests\AlunoUpdateRequest;
use App\Models\AlunoDocumento;
use App\Models\AlunoNee;
use App\Models\Genero;
use App\Models\Nee;
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
            ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
            ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
            ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
            ->select(['alunos.*', DB::raw("(SELECT GROUP_CONCAT(nees.name SEPARATOR '##') FROM alunos_nees INNER JOIN nees ON alunos_nees.nee_id=nees.id WHERE aluno_id=alunos.id) as alunoNees"), 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName', 'turmas.sala as turmaSala', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
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
                //Buscar NEEs
                $registro['alunoNees'] = AlunoNee::where('aluno_id', '=', $id)->get();

                //Buscar Documentos
                $registro['alunoDocumentos'] = AlunoDocumento::where('aluno_id', '=', $id)->orderby('descricao')->get();

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

            //Nees
            $registros['nees'] = Nee::all();

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
            //Incluindo registro
            $registro = $this->aluno->create($request->all());

            //Gravar dados na tabela alunos_nees''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            $aluno_id = $registro['id'];

            $nees = Nee::all();

            foreach ($nees as $nee) {
                if (isset($request['nee_id_' . $nee['id']])) {
                    $data = array();
                    $data['aluno_id'] = $aluno_id;
                    $data['nee_id'] = $nee['id'];

                    AlunoNee::create($data);
                }
            }
            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            return response()->json(ApiReturn::data('Registro criado com sucesso.', 2010, null, null), 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    //Fazer store na tabela alunos_documentos
    public function store_documentos(Request $request)
    {
        try {
            //Incluindo registro
            AlunoDocumento::create($request->all());

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
                //Alterando registro
                $registro->update($request->all());

                //Apagar dados na tabela alunos_nees''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
                AlunoNee::where('aluno_id', '=', $id)->delete();
                //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

                //Gravar dados na tabela alunos_nees''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
                $aluno_id = $id;

                $nees = Nee::all();

                foreach ($nees as $nee) {
                    if (isset($request['nee_id_' . $nee['id']])) {
                        $data = array();
                        $data['aluno_id'] = $aluno_id;
                        $data['nee_id'] = $nee['id'];

                        AlunoNee::create($data);
                    }
                }
                //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

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
                ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
                ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
                ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
                ->select(['alunos.*', DB::raw("(SELECT GROUP_CONCAT(nees.name SEPARATOR '##') FROM alunos_nees INNER JOIN nees ON alunos_nees.nee_id=nees.id WHERE aluno_id=alunos.id) as alunoNees"), 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName', 'turmas.sala as turmaSala', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
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

                //Apagar dados na tabela alunos_nees''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
                AlunoNee::where('aluno_id', '=', $id)->delete();
                //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

                //Apagar dados na tabela alunos_documentos''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
                AlunoDocumento::where('aluno_id', '=', $id)->delete();
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
            ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
            ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
            ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
            ->select(['alunos.*', DB::raw("(SELECT GROUP_CONCAT(nees.name SEPARATOR '##') FROM alunos_nees INNER JOIN nees ON alunos_nees.nee_id=nees.id WHERE aluno_id=alunos.id) as alunoNees"), 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName', 'turmas.sala as turmaSala', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
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
            ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
            ->leftJoin('niveis_ensinos', 'turmas.nivel_ensino_id', '=', 'niveis_ensinos.id')
            ->leftJoin('professores', 'turmas.professor_id', '=', 'professores.id')
            ->select(['alunos.*', DB::raw("(SELECT GROUP_CONCAT(nees.name SEPARATOR '##') FROM alunos_nees INNER JOIN nees ON alunos_nees.nee_id=nees.id WHERE aluno_id=alunos.id) as alunoNees"), 'generos.name as generoName', 'racas.name as racaName', 'turmas.name as turmaName', 'turmas.sala as turmaSala', 'escolas.name as escolaName', 'niveis_ensinos.name as nivelEnsinoName', 'professores.name as professorName'])
            ->where($fieldSearch, 'like', '%' . $fieldValue . '%')
            ->get($fieldReturn);

        return response()->json(ApiReturn::data('', 2000, null, $registros), 200);
    }

    public function deletar_documento($aluno_documento_id)
    {
        $registro = AlunoDocumento::find($aluno_documento_id);

        if (!$registro) {
            return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, $registro), 404);
        } else {
            //Deletar
            $registro->delete();

            return response()->json(ApiReturn::data('Registro excluído com sucesso.', 2000, null, null), 200);
        }
    }
}
