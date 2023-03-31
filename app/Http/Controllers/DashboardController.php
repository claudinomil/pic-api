<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index($data)
    {
        $content = array();

        //Users
        if (substr($data, 0, 1) == 1) {
            //Quantidade de Registros
            $content['dashboardsUsersQtd'] = User::count();

            //Distribuição por Grupos
            $content['dashboardsUsersGrupos'] = DB::select("SELECT grupos.name, count(users.id) as qtd FROM users INNER JOIN grupos ON users.grupo_id=grupos.id GROUP BY grupos.name ORDER BY grupos.name");

            //Distribuição por Situacoes
            $content['dashboardsUsersSituacoes'] = DB::select("SELECT situacoes.name, count(users.id) as qtd FROM users INNER JOIN situacoes ON users.situacao_id=situacoes.id GROUP BY situacoes.name ORDER BY situacoes.name");
        }

        //Funcionarios
        if (substr($data, 2, 1) == 1) {
            $content['dashboardsFuncionariosQtd'] = Funcionario::count();

            //Distribuição por Funções
            $content['dashboardsFuncionariosFuncoes'] = DB::select("SELECT funcoes.name, count(funcionarios.id) as qtd FROM funcionarios INNER JOIN funcoes ON funcionarios.funcao_id=funcoes.id GROUP BY funcoes.name ORDER BY funcoes.name");

            //Distribuição por Gêneros
            $content['dashboardsFuncionariosGeneros'] = DB::select("SELECT generos.name, count(funcionarios.id) as qtd FROM funcionarios INNER JOIN generos ON funcionarios.genero_id=generos.id GROUP BY generos.name ORDER BY generos.name");
        }

        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, '', $content), 200);
    }
}
