<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index($id, $data)
    {
        $content = array();

        //Users
        $users = strpos($data, 'dashboardsUsers');
        if ($users !== false) {
            //Criando Dados geral'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //Quantidade de Registros
            $quantidade_registros = User::count();

            //Grupos
            $grupo = '';
            $quantidade_grupos = count(DB::select('SELECT grupo_id FROM users GROUP BY grupo_id;'));

            //Situações
            $situacao = '';
            $quantidade_situacoes = count(DB::select('SELECT situacao_id FROM users GROUP BY situacao_id;'));

            //Quantidade de Operações
            $quantidade_operacoes_1 = count(DB::select('SELECT user_id FROM transacoes WHERE user_id IN (SELECT id FROM users) AND operacao_id=1;'));
            $quantidade_operacoes_2 = count(DB::select('SELECT user_id FROM transacoes WHERE user_id IN (SELECT id FROM users) AND operacao_id=2;'));
            $quantidade_operacoes_3 = count(DB::select('SELECT user_id FROM transacoes WHERE user_id IN (SELECT id FROM users) AND operacao_id=3;'));

            //Dados
            $dadosUsers[] = ['id' => '0', 'name' => $quantidade_registros . ' Registros', 'avatar' => 'build/assets/images/users/usuarios.jpg', 'grupo' => '', 'quantidade_grupos' => $quantidade_grupos, 'situacao' => '', 'quantidade_situacoes' => $quantidade_situacoes, 'quantidade_operacoes_1' => $quantidade_operacoes_1, 'quantidade_operacoes_2' => $quantidade_operacoes_2, 'quantidade_operacoes_3' => $quantidade_operacoes_3];
            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //Criando Dados de cada Usuário'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            $users = DB::table('users')
                ->leftJoin('grupos', 'users.grupo_id', '=', 'grupos.id')
                ->leftJoin('situacoes', 'users.situacao_id', '=', 'situacoes.id')
                ->select('users.id', 'users.name', 'users.avatar', 'grupos.name AS grupo', 'situacoes.name AS situacao')
                ->get();

            foreach ($users as $user) {
                //Quantidade de Operações
                $quantidade_operacoes_1 = count(DB::select('SELECT user_id FROM transacoes WHERE user_id='.$user->id.' AND operacao_id=1;'));
                $quantidade_operacoes_2 = count(DB::select('SELECT user_id FROM transacoes WHERE user_id='.$user->id.' AND operacao_id=2;'));
                $quantidade_operacoes_3 = count(DB::select('SELECT user_id FROM transacoes WHERE user_id='.$user->id.' AND operacao_id=3;'));

                //Dados
                $dadosUsers[] = ['id' => $user->id, 'name' => $user->name, 'avatar' => $user->avatar, 'grupo' => $user->grupo, 'quantidade_grupos' => 1, 'situacao' => $user->situacao, 'quantidade_situacoes' => 1, 'quantidade_operacoes_1' => $quantidade_operacoes_1, 'quantidade_operacoes_2' => $quantidade_operacoes_2, 'quantidade_operacoes_3' => $quantidade_operacoes_3];
            }
            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //retorno
            $content['dashboardsUsersDados'] = $dadosUsers;
        }

        //Professores
        $professores = strpos($data, 'dashboardsProfessores');
        if ($professores !== false) {
            //Criando Dados geral'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //Quantidade de Registros
            $quantidade_registros = Professor::count();

            //Escolas
            $escolas = '';
            $quantidade_escolas = count(DB::select('SELECT escola_id FROM turmas WHERE professor_id IN(SELECT id FROM professores) GROUP BY escola_id;'));

            //Turmas
            $turmas = '';
            $quantidade_turmas = count(DB::select('SELECT id FROM turmas WHERE professor_id IN(SELECT id FROM professores) GROUP BY id;'));

            //Alunos
            $alunos = '';
            $quantidade_alunos = count(DB::select('SELECT id FROM alunos WHERE turma_id IN(SELECT id FROM turmas WHERE professor_id IN(SELECT id FROM professores)) GROUP BY id;'));

            //Dados
            $dadosProfessores[] = ['id' => '0', 'name' => $quantidade_registros.' Registros', 'foto' => 'build/assets/images/professores/professores.png', 'escolas' => $escolas, 'quantidade_escolas' => $quantidade_escolas, 'turmas' => $turmas, 'quantidade_turmas' => $quantidade_turmas, 'alunos' => $alunos, 'quantidade_alunos' => $quantidade_alunos];
            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //Criando Dados de cada Professor'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            $professores = DB::table('professores')
                ->select('id', 'name', 'foto')
                ->get();

            foreach ($professores as $professor) {
                //Escolas
                $registros = DB::table('turmas')
                    ->leftJoin('escolas', 'turmas.escola_id', '=', 'escolas.id')
                    ->select('escolas.name')
                    ->where('turmas.professor_id', '=', $professor->id)
                    ->get();

                $escolas  = '';
                $quantidade_escolas  = 0;

                foreach ($registros as $escola) {
                    $escolas .= $escola->name.'<br>';
                    $quantidade_escolas++;
                }

                //Turmas
                $registros = DB::table('turmas')
                    ->select('sala')
                    ->where('professor_id', '=', $professor->id)
                    ->get();

                $turmas  = '';
                $quantidade_turmas  = 0;

                foreach ($registros as $turma) {
                    $turmas .= $turma->sala.'<br>';
                    $quantidade_turmas++;
                }

                //Alunos (NÃO FIZO DE ALUNOS POIS O SUBMODULO ANDA NAO ESTAVA PRONTO)
                $alunos = '';
                $quantidade_alunos = 0;

                //Dados
                $dadosProfessores[] = ['id' => $professor->id, 'name' => $professor->name, 'foto' => $professor->foto, 'escolas' => $escolas, 'quantidade_escolas' => $quantidade_escolas, 'turmas' => $turmas, 'quantidade_turmas' => $quantidade_turmas, 'alunos' => $alunos, 'quantidade_alunos' => $quantidade_alunos];
            }
            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //retorno
            $content['dashboardsProfessoresDados'] = $dadosProfessores;
        }

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, '', $content), 200);
    }
}
