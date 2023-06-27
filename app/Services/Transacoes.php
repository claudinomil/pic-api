<?php

namespace App\Services;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Funcionario;
use App\Models\Genero;
use App\Models\Grupo;
use App\Models\IdentidadeOrgao;
use App\Models\EstadoCivil;
use App\Models\Modulo;
use App\Models\Nacionalidade;
use App\Models\Naturalidade;
use App\Models\Funcao;
use App\Models\Escolaridade;
use App\Models\NivelEnsino;
use App\Models\Professor;
use App\Models\Raca;
use App\Models\SistemaAcesso;
use App\Models\Situacao;
use App\Models\Estado;
use App\Models\TipoEscola;
use App\Models\Transacao;
use App\Models\Turma;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Transacoes
{
    //Função para Gravar Transação
    public function transacaoRecord($operacao, $submodulo, $beforeData, $laterData) {
        //Gravar transação
        if (Auth::check()) {
            //submodulo_id'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            $data = DB::table('submodulos')->select(['id'])->where('prefix_route', $submodulo)->get()->toArray();

            $submodulo_id = $data[0]->id;
            //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //montar campo dados'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            $dados = '';

            //modulos
            if ($submodulo_id == 1) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['menu_text'] != $laterData['menu_text']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu Texto: " . $y . $laterData['menu_text'] . "<br>";

                if ($beforeData['menu_url'] != $laterData['menu_url']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu URL: " . $y . $laterData['menu_url'] . "<br>";

                if ($beforeData['menu_route'] != $laterData['menu_route']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu Rota: " . $y . $laterData['menu_route'] . "<br>";

                if ($beforeData['menu_icon'] != $laterData['menu_icon']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu Ícone: " . $y . $laterData['menu_icon'] . "<br>";

                if ($beforeData['viewing_order'] != $laterData['viewing_order']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Ordem Visualização: " . $y . $laterData['viewing_order'] . "<br>";
            }

            //submodulos
            if ($submodulo_id == 2) {
                if ($beforeData['modulo_id'] != $laterData['modulo_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['modulo_id'] != "") and ($laterData['modulo_id'] != 0)) {
                    $search = Modulo::where('id', $laterData['modulo_id'])->get(['name']);
                    $dados .= $x . "Módulo: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['menu_text'] != $laterData['menu_text']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu Texto: " . $y . $laterData['menu_text'] . "<br>";

                if ($beforeData['menu_url'] != $laterData['menu_url']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu URL: " . $y . $laterData['menu_url'] . "<br>";

                if ($beforeData['menu_route'] != $laterData['menu_route']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu Rota: " . $y . $laterData['menu_route'] . "<br>";

                if ($beforeData['menu_icon'] != $laterData['menu_icon']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Menu Ícone: " . $y . $laterData['menu_icon'] . "<br>";

                if ($beforeData['prefix_permissao'] != $laterData['prefix_permissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Prefixo Permissão: " . $y . $laterData['prefix_permissao'] . "<br>";

                if ($beforeData['prefix_route'] != $laterData['prefix_route']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Prefixo Rota: " . $y . $laterData['prefix_route'] . "<br>";

                if ($beforeData['viewing_order'] != $laterData['viewing_order']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Ordem Visualização: " . $y . $laterData['viewing_order'] . "<br>";
            }

            //grupos
            if ($submodulo_id == 4) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //users
            if ($submodulo_id == 5) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['email'] != $laterData['email']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "E-mail: " . $y . $laterData['email'] . "<br>";

                if ($beforeData['avatar'] != $laterData['avatar']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Avatar: " . $y . $laterData['avatar'] . "<br>";

                if ($beforeData['layout_style'] != $laterData['layout_style']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Layout Style: " . $y . $laterData['layout_style'] . "<br>";

                if ($beforeData['layout_mode'] != $laterData['layout_mode']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Layout Mode: " . $y . $laterData['layout_mode'] . "<br>";

                if ($beforeData['grupo_id'] != $laterData['grupo_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['grupo_id'] != "") and ($laterData['grupo_id'] != 0)) {
                    $search = Grupo::where('id', $laterData['grupo_id'])->get(['name']);
                    $dados .= $x . "Grupo: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['situacao_id'] != $laterData['situacao_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['situacao_id'] != "") and ($laterData['situacao_id'] != 0)) {
                    $search = Situacao::where('id', $laterData['situacao_id'])->get(['name']);
                    $dados .= $x . "Situação: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['funcionario_id'] != $laterData['funcionario_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['funcionario_id'] != "") and ($laterData['funcionario_id'] != 0)) {
                    $search = Funcionario::where('id', $laterData['funcionario_id'])->get(['name']);
                    $dados .= $x . "Funcionário: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['sistema_acesso_id'] != $laterData['sistema_acesso_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['sistema_acesso_id'] != "") and ($laterData['sistema_acesso_id'] != 0)) {
                    $search = SistemaAcesso::where('id', $laterData['sistema_acesso_id'])->get(['name']);
                    $dados .= $x . "Sistema Acesso: " . $y . $search[0]['name'] . "<br>";
                }
            }

            //notificacoes
            if ($submodulo_id == 7) {
                if ($beforeData['date'] != $laterData['date']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data: " . $y . $laterData['date'] . "<br>";

                if ($beforeData['time'] != $laterData['time']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Hora: " . $y . $laterData['time'] . "<br>";

                if ($beforeData['title'] != $laterData['title']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Título: " . $y . $laterData['title'] . "<br>";

                if ($beforeData['notificacao'] != $laterData['notificacao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Notificação: " . $y . $laterData['notificacao'] . "<br>";

                if ($beforeData['user_id'] != $laterData['user_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['user_id'] != "") and ($laterData['user_id'] != 0)) {
                    $search = User::where('id', $laterData['user_id'])->get(['name']);
                    $dados .= $x . "Usuário: " . $y . $search[0]['name'] . "<br>";
                }
            }

            //ferramentas
            if ($submodulo_id == 9) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['descricao'] != $laterData['descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Descrição: " . $y . $laterData['descricao'] . "<br>";

                if ($beforeData['url'] != $laterData['url']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "URL: " . $y . $laterData['url'] . "<br>";

                if ($beforeData['icon'] != $laterData['icon']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Ícone: " . $y . $laterData['icon'] . "<br>";

                if ($beforeData['viewing_order'] != $laterData['viewing_order']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Ordem Visualização: " . $y . $laterData['viewing_order'] . "<br>";
            }
            //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //escolas
            if ($submodulo_id == 10) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['tipo_escola_id'] != $laterData['tipo_escola_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['tipo_escola_id'] != "") and ($laterData['tipo_escola_id'] != 0)) {
                    $search =TipoEscola::where('id', $laterData['tipo_escola_id'])->get(['name']);
                    $dados .= $x . "Tipo Escola: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['telefone_1'] != $laterData['telefone_1']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone 1: " . $y . $laterData['telefone_1'] . "<br>";

                if ($beforeData['telefone_2'] != $laterData['telefone_2']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone 2: " . $y . $laterData['telefone_2'] . "<br>";

                if ($beforeData['cep'] != $laterData['cep']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "CEP: " . $y . $laterData['cep'] . "<br>";

                if ($beforeData['numero'] != $laterData['numero']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Número: " . $y . $laterData['numero'] . "<br>";

                if ($beforeData['complemento'] != $laterData['complemento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Complemento: " . $y . $laterData['complemento'] . "<br>";

                if ($beforeData['logradouro'] != $laterData['logradouro']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Logradouro: " . $y . $laterData['logradouro'] . "<br>";

                if ($beforeData['bairro'] != $laterData['bairro']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Bairro: " . $y . $laterData['bairro'] . "<br>";

                if ($beforeData['localidade'] != $laterData['localidade']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Localidade: " . $y . $laterData['localidade'] . "<br>";

                if ($beforeData['uf'] != $laterData['uf']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "UF: " . $y . $laterData['uf'] . "<br>";
            }

            //departamentos
            if ($submodulo_id == 11) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //estados_civis
            if ($submodulo_id == 12) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //nacionalidades
            if ($submodulo_id == 13) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['nation'] != $laterData['nation']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "País: " . $y . $laterData['nation'] . "<br>";
            }

            //escolaridades
            if ($submodulo_id == 14) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //naturalidades
            if ($submodulo_id == 15) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //generos
            if ($submodulo_id == 16) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //funcoes
            if ($submodulo_id == 17) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //funcionarios
            if ($submodulo_id == 18) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['data_nascimento'] != $laterData['data_nascimento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Nascimento: " . $y . $laterData['data_nascimento'] . "<br>";

                if ($beforeData['genero_id'] != $laterData['genero_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['genero_id'] != "") and ($laterData['genero_id'] != 0)) {
                    $search = Genero::where('id', $laterData['genero_id'])->get(['name']);
                    $dados .= $x . "Gênero: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['estado_civil_id'] != $laterData['estado_civil_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['estado_civil_id'] != "") and ($laterData['estado_civil_id'] != 0)) {
                    $search = EstadoCivil::where('id', $laterData['estado_civil_id'])->get(['name']);
                    $dados .= $x . "Estado Civil: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['escolaridade_id'] != $laterData['escolaridade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['escolaridade_id'] != "") and ($laterData['escolaridade_id'] != 0)) {
                    $search = Escolaridade::where('id', $laterData['escolaridade_id'])->get(['name']);
                    $dados .= $x . "Escolaridade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['nacionalidade_id'] != $laterData['nacionalidade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['nacionalidade_id'] != "") and ($laterData['nacionalidade_id'] != 0)) {
                    $search = Nacionalidade::where('id', $laterData['nacionalidade_id'])->get(['name']);
                    $dados .= $x . "Nacionalidade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['naturalidade_id'] != $laterData['naturalidade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['naturalidade_id'] != "") and ($laterData['naturalidade_id'] != 0)) {
                    $search = Naturalidade::where('id', $laterData['naturalidade_id'])->get(['name']);
                    $dados .= $x . "Naturalidade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['pai'] != $laterData['pai']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Pai: " . $y . $laterData['pai'] . "<br>";

                if ($beforeData['mae'] != $laterData['mae']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Mãe: " . $y . $laterData['mae'] . "<br>";

                if ($beforeData['email'] != $laterData['email']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "E-mail: " . $y . $laterData['email'] . "<br>";

                if ($beforeData['telefone_1'] != $laterData['telefone_1']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone 1: " . $y . $laterData['telefone_1'] . "<br>";

                if ($beforeData['telefone_2'] != $laterData['telefone_2']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone 2: " . $y . $laterData['telefone_2'] . "<br>";

                if ($beforeData['celular_1'] != $laterData['celular_1']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Celular 1: " . $y . $laterData['celular_1'] . "<br>";

                if ($beforeData['celular_2'] != $laterData['celular_2']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Celular 2: " . $y . $laterData['celular_2'] . "<br>";

                if ($beforeData['funcao_id'] != $laterData['funcao_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['funcao_id'] != "") and ($laterData['funcao_id'] != 0)) {
                    $search = Funcao::where('id', $laterData['funcao_id'])->get(['name']);
                    $dados .= $x . "Função: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['data_admissao'] != $laterData['data_admissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Admissão: " . $y . $laterData['data_admissao'] . "<br>";

                if ($beforeData['data_demissao'] != $laterData['data_demissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Demissão: " . $y . $laterData['data_demissao'] . "<br>";

                if ($beforeData['pessoal_identidade_orgao_id'] != $laterData['pessoal_identidade_orgao_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['pessoal_identidade_orgao_id'] != "") and ($laterData['pessoal_identidade_orgao_id'] != 0)) {
                    $search = IdentidadeOrgao::where('id', $laterData['pessoal_identidade_orgao_id'])->get(['name']);
                    $dados .= $x . "Identidade Pessoal (Órgão): " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['pessoal_identidade_estado_id'] != $laterData['pessoal_identidade_estado_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['pessoal_identidade_estado_id'] != "") and ($laterData['pessoal_identidade_estado_id'] != 0)) {
                    $search = Estado::where('id', $laterData['pessoal_identidade_estado_id'])->get(['name']);
                    $dados .= $x . "Identidade Pessoal (Estado): " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['pessoal_identidade_numero'] != $laterData['pessoal_identidade_numero']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Identidade Pessoal (Número): " . $y . $laterData['pessoal_identidade_numero'] . "<br>";

                if ($beforeData['pessoal_identidade_data_emissao'] != $laterData['pessoal_identidade_data_emissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Identidade Pessoal (Emissão): " . $y . $laterData['pessoal_identidade_data_emissao'] . "<br>";

                if ($beforeData['profissional_identidade_orgao_id'] != $laterData['profissional_identidade_orgao_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['profissional_identidade_orgao_id'] != "") and ($laterData['profissional_identidade_orgao_id'] != 0)) {
                    $search = IdentidadeOrgao::where('id', $laterData['profissional_identidade_orgao_id'])->get(['name']);
                    $dados .= $x . "Identidade Profissional (Órgão): " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['profissional_identidade_estado_id'] != $laterData['profissional_identidade_estado_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['profissional_identidade_estado_id'] != "") and ($laterData['profissional_identidade_estado_id'] != 0)) {
                    $search = Estado::where('id', $laterData['profissional_identidade_estado_id'])->get(['name']);
                    $dados .= $x . "Identidade Profissional (Estado): " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['profissional_identidade_numero'] != $laterData['profissional_identidade_numero']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Identidade Profissional (Número): " . $y . $laterData['profissional_identidade_numero'] . "<br>";

                if ($beforeData['profissional_identidade_data_emissao'] != $laterData['profissional_identidade_data_emissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Identidade Profissional (Emissão): " . $y . $laterData['profissional_identidade_data_emissao'] . "<br>";

                if ($beforeData['cpf'] != $laterData['cpf']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "CPF: " . $y . $laterData['cpf'] . "<br>";

                if ($beforeData['pis'] != $laterData['pis']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "PIS: " . $y . $laterData['pis'] . "<br>";

                if ($beforeData['pasep'] != $laterData['pasep']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "PASEP: " . $y . $laterData['pasep'] . "<br>";

                if ($beforeData['carteira_trabalho'] != $laterData['carteira_trabalho']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Carteira Trabalho: " . $y . $laterData['carteira_trabalho'] . "<br>";

                if ($beforeData['cep'] != $laterData['cep']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "CEP: " . $y . $laterData['cep'] . "<br>";

                if ($beforeData['numero'] != $laterData['numero']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Número: " . $y . $laterData['numero'] . "<br>";

                if ($beforeData['complemento'] != $laterData['complemento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Complemento: " . $y . $laterData['complemento'] . "<br>";

                if ($beforeData['logradouro'] != $laterData['logradouro']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Logradouro: " . $y . $laterData['logradouro'] . "<br>";

                if ($beforeData['bairro'] != $laterData['bairro']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Bairro: " . $y . $laterData['bairro'] . "<br>";

                if ($beforeData['localidade'] != $laterData['localidade']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Localidade: " . $y . $laterData['localidade'] . "<br>";

                if ($beforeData['uf'] != $laterData['uf']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "UF: " . $y . $laterData['uf'] . "<br>";
            }

            //identidade_orgaos
            if ($submodulo_id == 19) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['sigla'] != $laterData['sigla']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Sigla: " . $y . $laterData['sigla'] . "<br>";
            }

            //professores
            if ($submodulo_id == 20) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['data_nascimento'] != $laterData['data_nascimento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Nascimento: " . $y . $laterData['data_nascimento'] . "<br>";

                if ($beforeData['genero_id'] != $laterData['genero_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['genero_id'] != "") and ($laterData['genero_id'] != 0)) {
                    $search = Genero::where('id', $laterData['genero_id'])->get(['name']);
                    $dados .= $x . "Gênero: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['estado_civil_id'] != $laterData['estado_civil_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['estado_civil_id'] != "") and ($laterData['estado_civil_id'] != 0)) {
                    $search = EstadoCivil::where('id', $laterData['estado_civil_id'])->get(['name']);
                    $dados .= $x . "Estado Civil: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['escolaridade_id'] != $laterData['escolaridade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['escolaridade_id'] != "") and ($laterData['escolaridade_id'] != 0)) {
                    $search = Escolaridade::where('id', $laterData['escolaridade_id'])->get(['name']);
                    $dados .= $x . "Escolaridade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['nacionalidade_id'] != $laterData['nacionalidade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['nacionalidade_id'] != "") and ($laterData['nacionalidade_id'] != 0)) {
                    $search = Nacionalidade::where('id', $laterData['nacionalidade_id'])->get(['name']);
                    $dados .= $x . "Nacionalidade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['naturalidade_id'] != $laterData['naturalidade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['naturalidade_id'] != "") and ($laterData['naturalidade_id'] != 0)) {
                    $search = Naturalidade::where('id', $laterData['naturalidade_id'])->get(['name']);
                    $dados .= $x . "Naturalidade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['pai'] != $laterData['pai']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Pai: " . $y . $laterData['pai'] . "<br>";

                if ($beforeData['mae'] != $laterData['mae']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Mãe: " . $y . $laterData['mae'] . "<br>";

                if ($beforeData['email'] != $laterData['email']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "E-mail: " . $y . $laterData['email'] . "<br>";

                if ($beforeData['telefone_1'] != $laterData['telefone_1']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone 1: " . $y . $laterData['telefone_1'] . "<br>";

                if ($beforeData['telefone_2'] != $laterData['telefone_2']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone 2: " . $y . $laterData['telefone_2'] . "<br>";

                if ($beforeData['celular_1'] != $laterData['celular_1']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Celular 1: " . $y . $laterData['celular_1'] . "<br>";

                if ($beforeData['celular_2'] != $laterData['celular_2']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Celular 2: " . $y . $laterData['celular_2'] . "<br>";

                if ($beforeData['funcao_id'] != $laterData['funcao_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['funcao_id'] != "") and ($laterData['funcao_id'] != 0)) {
                    $search = Funcao::where('id', $laterData['funcao_id'])->get(['name']);
                    $dados .= $x . "Função: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['data_admissao'] != $laterData['data_admissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Admissão: " . $y . $laterData['data_admissao'] . "<br>";

                if ($beforeData['data_demissao'] != $laterData['data_demissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Demissão: " . $y . $laterData['data_demissao'] . "<br>";

                if ($beforeData['profissional_identidade_orgao_id'] != $laterData['profissional_identidade_orgao_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['profissional_identidade_orgao_id'] != "") and ($laterData['profissional_identidade_orgao_id'] != 0)) {
                    $search = IdentidadeOrgao::where('id', $laterData['profissional_identidade_orgao_id'])->get(['name']);
                    $dados .= $x . "Identidade Profissional (Órgão): " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['profissional_identidade_estado_id'] != $laterData['profissional_identidade_estado_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['profissional_identidade_estado_id'] != "") and ($laterData['profissional_identidade_estado_id'] != 0)) {
                    $search = Estado::where('id', $laterData['profissional_identidade_estado_id'])->get(['name']);
                    $dados .= $x . "Identidade Profissional (Estado): " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['profissional_identidade_numero'] != $laterData['profissional_identidade_numero']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Identidade Profissional (Número): " . $y . $laterData['profissional_identidade_numero'] . "<br>";

                if ($beforeData['profissional_identidade_data_emissao'] != $laterData['profissional_identidade_data_emissao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Identidade Profissional (Emissão): " . $y . $laterData['profissional_identidade_data_emissao'] . "<br>";

                if ($beforeData['cpf'] != $laterData['cpf']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "CPF: " . $y . $laterData['cpf'] . "<br>";

                if ($beforeData['pis'] != $laterData['pis']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "PIS: " . $y . $laterData['pis'] . "<br>";

                if ($beforeData['pasep'] != $laterData['pasep']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "PASEP: " . $y . $laterData['pasep'] . "<br>";

                if ($beforeData['carteira_trabalho'] != $laterData['carteira_trabalho']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Carteira Trabalho: " . $y . $laterData['carteira_trabalho'] . "<br>";
            }

            //alunos
            if ($submodulo_id == 22) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['data_nascimento'] != $laterData['data_nascimento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Nascimento: " . $y . $laterData['data_nascimento'] . "<br>";

                if ($beforeData['genero_id'] != $laterData['genero_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['genero_id'] != "") and ($laterData['genero_id'] != 0)) {
                    $search = Genero::where('id', $laterData['genero_id'])->get(['name']);
                    $dados .= $x . "Gênero: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['turma_id'] != $laterData['turma_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['turma_id'] != "") and ($laterData['turma_id'] != 0)) {
                    $search = Turma::where('id', $laterData['turma_id'])->get(['name']);
                    $dados .= $x . "Turma: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['data_matricula'] != $laterData['data_matricula']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Matrícula: " . $y . $laterData['data_matricula'] . "<br>";

                if ($beforeData['raca_id'] != $laterData['raca_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['raca_id'] != "") and ($laterData['raca_id'] != 0)) {
                    $search = Raca::where('id', $laterData['raca_id'])->get(['name']);
                    $dados .= $x . "Raça: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['nacionalidade_id'] != $laterData['nacionalidade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['nacionalidade_id'] != "") and ($laterData['nacionalidade_id'] != 0)) {
                    $search = Nacionalidade::where('id', $laterData['nacionalidade_id'])->get(['name']);
                    $dados .= $x . "Nacionalidade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['naturalidade_id'] != $laterData['naturalidade_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['naturalidade_id'] != "") and ($laterData['naturalidade_id'] != 0)) {
                    $search = Naturalidade::where('id', $laterData['naturalidade_id'])->get(['name']);
                    $dados .= $x . "Naturalidade: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['pai'] != $laterData['pai']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Pai: " . $y . $laterData['pai'] . "<br>";

                if ($beforeData['mae'] != $laterData['mae']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Mãe: " . $y . $laterData['mae'] . "<br>";

                if ($beforeData['telefone_pai'] != $laterData['telefone_pai']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone Pai: " . $y . $laterData['telefone_pai'] . "<br>";

                if ($beforeData['telefone_mae'] != $laterData['telefone_mae']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Telefone Mãe: " . $y . $laterData['telefone_mae'] . "<br>";

                if ($beforeData['cpf'] != $laterData['cpf']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "CPF: " . $y . $laterData['cpf'] . "<br>";

                if ($beforeData['responsavel_legal_nome'] != $laterData['responsavel_legal_nome']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Responsável Legal Nome: " . $y . $laterData['responsavel_legal_nome'] . "<br>";

                if ($beforeData['responsavel_legal_parentesco'] != $laterData['responsavel_legal_parentesco']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Responsável Legal Parentesco: " . $y . $laterData['responsavel_legal_parentesco'] . "<br>";

                if ($beforeData['responsavel_legal_telefone'] != $laterData['responsavel_legal_telefone']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Responsável Legal Telefone: " . $y . $laterData['responsavel_legal_telefone'] . "<br>";

                if ($beforeData['responsavel_legal_celular'] != $laterData['responsavel_legal_celular']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Responsável Legal Celular: " . $y . $laterData['responsavel_legal_celular'] . "<br>";

                if ($beforeData['problema_saude'] != $laterData['problema_saude']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Problema Saúde: " . $y . $laterData['problema_saude'] . "<br>";

                if ($beforeData['problema_saude_descricao'] != $laterData['problema_saude_descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Problema Saúde Descrição: " . $y . $laterData['problema_saude_descricao'] . "<br>";

                if ($beforeData['acompanhamento_saude'] != $laterData['acompanhamento_saude']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Acompanhamento Saúde: " . $y . $laterData['acompanhamento_saude'] . "<br>";

                if ($beforeData['acompanhamento_saude_descricao'] != $laterData['acompanhamento_saude_descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Acompanhamento Saúde Descrção: " . $y . $laterData['acompanhamento_saude_descricao'] . "<br>";

                if ($beforeData['medicamento_controlado'] != $laterData['medicamento_controlado']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Medicamento Controlado: " . $y . $laterData['medicamento_controlado'] . "<br>";

                if ($beforeData['medicamento_controlado_descricao'] != $laterData['medicamento_controlado_descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Medicamento Controlado Descrição: " . $y . $laterData['medicamento_controlado_descricao'] . "<br>";

                if ($beforeData['laudo_nee_ou_transtorno'] != $laterData['laudo_nee_ou_transtorno']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Laudo NEE ou Transtorno: " . $y . $laterData['laudo_nee_ou_transtorno'] . "<br>";

                if ($beforeData['laudo_nee_ou_transtorno_descricao'] != $laterData['laudo_nee_ou_transtorno_descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Laudo NEE ou Transtorno Descrição: " . $y . $laterData['laudo_nee_ou_transtorno_descricao'] . "<br>";

                if ($beforeData['cep'] != $laterData['cep']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "CEP: " . $y . $laterData['cep'] . "<br>";

                if ($beforeData['numero'] != $laterData['numero']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Número: " . $y . $laterData['numero'] . "<br>";

                if ($beforeData['complemento'] != $laterData['complemento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Complemento: " . $y . $laterData['complemento'] . "<br>";

                if ($beforeData['logradouro'] != $laterData['logradouro']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Logradouro: " . $y . $laterData['logradouro'] . "<br>";

                if ($beforeData['bairro'] != $laterData['bairro']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Bairro: " . $y . $laterData['bairro'] . "<br>";

                if ($beforeData['localidade'] != $laterData['localidade']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Localidade: " . $y . $laterData['localidade'] . "<br>";

                if ($beforeData['uf'] != $laterData['uf']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "UF: " . $y . $laterData['uf'] . "<br>";

                if ($beforeData['foto'] != $laterData['foto']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Foto: " . $y . $laterData['foto'] . "<br>";
            }

            //tipos escolas
            if ($submodulo_id == 25) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //niveis ensino
            if ($submodulo_id == 26) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";
            }

            //turmas
            if ($submodulo_id == 27) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['escola_id'] != $laterData['escola_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['escola_id'] != "") and ($laterData['escola_id'] != 0)) {
                    $search = Escola::where('id', $laterData['escola_id'])->get(['name']);
                    $dados .= $x . "Escola: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['nivel_ensino_id'] != $laterData['nivel_ensino_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['nivel_ensino_id'] != "") and ($laterData['nivel_ensino_id'] != 0)) {
                    $search = NivelEnsino::where('id', $laterData['nivel_ensino_id'])->get(['name']);
                    $dados .= $x . "NÍvel Ensino: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['quantidade_alunos'] != $laterData['quantidade_alunos']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Quantidade Alunos: " . $y . $laterData['quantidade_alunos'] . "<br>";

                if ($beforeData['sala'] != $laterData['sala']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Sala: " . $y . $laterData['sala'] . "<br>";
            }

            //nees
            if ($submodulo_id == 28) {
                if ($beforeData['name'] != $laterData['name']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Nome: " . $y . $laterData['name'] . "<br>";

                if ($beforeData['descricao'] != $laterData['descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Descrição: " . $y . $laterData['name'] . "<br>";
            }

            //Calendário Inclusivo
            if ($submodulo_id == 30) {
                if ($beforeData['data_evento'] != $laterData['data_evento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Evento: " . $y . $laterData['data_evento'] . "<br>";

                if ($beforeData['data_evento_descricao'] != $laterData['data_evento_descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data Evento Descrição: " . $y . $laterData['data_evento_descricao'] . "<br>";

                if ($beforeData['evento'] != $laterData['evento']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Evento: " . $y . $laterData['evento'] . "<br>";

                if ($beforeData['sugestao_atividade'] != $laterData['sugestao_atividade']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Sugestão Atividade: " . $y . $laterData['sugestao_atividade'] . "<br>";
            }

            //Espaço Colaboração
            if ($submodulo_id == 31) {
                if ($beforeData['aluno_id'] != $laterData['aluno_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['aluno_id'] != "") and ($laterData['aluno_id'] != 0)) {
                    $search = Aluno::where('id', $laterData['aluno_id'])->get(['name']);
                    $dados .= $x . "Aluno: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['professor_id'] != $laterData['professor_id']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                if (($laterData['professor_id'] != "") and ($laterData['professor_id'] != 0)) {
                    $search = Professor::where('id', $laterData['professor_id'])->get(['name']);
                    $dados .= $x . "Professor: " . $y . $search[0]['name'] . "<br>";
                }

                if ($beforeData['data'] != $laterData['data']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Data: " . $y . $laterData['data'] . "<br>";

                if ($beforeData['hora'] != $laterData['hora']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Hora: " . $y . $laterData['hora'] . "<br>";

                if ($beforeData['observacao_resumo'] != $laterData['observacao_resumo']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Observação Resumo: " . $y . $laterData['observacao_resumo'] . "<br>";

                if ($beforeData['observacao'] != $laterData['observacao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Observação: " . $y . $laterData['observacao'] . "<br>";
            }

            //Sobre o Produto Educacional
            if ($submodulo_id == 32) {
                if ($beforeData['descricao'] != $laterData['descricao']) {
                    $x = "<font class='text-danger'>";
                    $y = "</font>";
                } else {
                    $x = "";
                    $y = "";
                }
                $dados .= $x . "Descrição: " . $y . $laterData['descricao'] . "<br>";
            }

            //gravar transacao'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            if ($dados != '') {
                $trasaction = Array();
                $trasaction['date'] = date('Y-m-d');
                $trasaction['time'] = date('H:i:s');
                $trasaction['user_id'] = Auth::user()->id;
                $trasaction['operacao_id'] = $operacao;
                $trasaction['submodulo_id'] = $submodulo_id;
                $trasaction['dados'] = $dados;

                Transacao::create($trasaction);
            }
            //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        }

        return true;
    }
}
