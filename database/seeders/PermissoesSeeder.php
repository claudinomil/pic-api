<?php

namespace Database\Seeders;

use App\Models\Grupo;
use App\Models\GrupoPermissao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permissao;

class PermissoesSeeder extends Seeder
{
    public function run()
    {
        //criando Permissoes
        Permissao::create(['submodulo_id' => 1, 'name' => 'modulos_list', 'description' => 'Visualizar Registro - Módulos']);
        Permissao::create(['submodulo_id' => 1, 'name' => 'modulos_create', 'description' => 'Criar Registro - Módulos']);
        Permissao::create(['submodulo_id' => 1, 'name' => 'modulos_show', 'description' => 'Visualizar Registro - Módulos']);
        Permissao::create(['submodulo_id' => 1, 'name' => 'modulos_edit', 'description' => 'Editar Registro - Módulos']);
        Permissao::create(['submodulo_id' => 1, 'name' => 'modulos_destroy', 'description' => 'Deletar Registro - Módulos']);

        Permissao::create(['submodulo_id' => 2, 'name' => 'submodulos_list', 'description' => 'Visualizar Registro - Submódulos']);
        Permissao::create(['submodulo_id' => 2, 'name' => 'submodulos_create', 'description' => 'Criar Registro - Submódulos']);
        Permissao::create(['submodulo_id' => 2, 'name' => 'submodulos_show', 'description' => 'Visualizar Registro - Submódulos']);
        Permissao::create(['submodulo_id' => 2, 'name' => 'submodulos_edit', 'description' => 'Editar Registro - Submódulos']);
        Permissao::create(['submodulo_id' => 2, 'name' => 'submodulos_destroy', 'description' => 'Deletar Registro - Submódulos']);

        Permissao::create(['submodulo_id' => 3, 'name' => 'home_list', 'description' => 'Visualizar Registro - Home']);
        Permissao::create(['submodulo_id' => 3, 'name' => 'home_create', 'description' => 'Criar Registro - Home']);
        Permissao::create(['submodulo_id' => 3, 'name' => 'home_show', 'description' => 'Visualizar Registro - Home']);
        Permissao::create(['submodulo_id' => 3, 'name' => 'home_edit', 'description' => 'Editar Registro - Home']);
        Permissao::create(['submodulo_id' => 3, 'name' => 'home_destroy', 'description' => 'Deletar Registro - Home']);

        Permissao::create(['submodulo_id' => 4, 'name' => 'grupos_list', 'description' => 'Visualizar Registro - Grupos']);
        Permissao::create(['submodulo_id' => 4, 'name' => 'grupos_create', 'description' => 'Criar Registro - Grupos']);
        Permissao::create(['submodulo_id' => 4, 'name' => 'grupos_show', 'description' => 'Visualizar Registro - Grupos']);
        Permissao::create(['submodulo_id' => 4, 'name' => 'grupos_edit', 'description' => 'Editar Registro - Grupos']);
        Permissao::create(['submodulo_id' => 4, 'name' => 'grupos_destroy', 'description' => 'Deletar Registro - Grupos']);

        Permissao::create(['submodulo_id' => 5, 'name' => 'users_list', 'description' => 'Visualizar Registro - Usuários']);
        Permissao::create(['submodulo_id' => 5, 'name' => 'users_create', 'description' => 'Criar Registro - Usuários']);
        Permissao::create(['submodulo_id' => 5, 'name' => 'users_show', 'description' => 'Visualizar Registro - Usuários']);
        Permissao::create(['submodulo_id' => 5, 'name' => 'users_edit', 'description' => 'Editar Registro - Usuários']);
        Permissao::create(['submodulo_id' => 5, 'name' => 'users_destroy', 'description' => 'Deletar Registro - Usuários']);

        Permissao::create(['submodulo_id' => 6, 'name' => 'customizes_list', 'description' => 'Visualizar Registro - Customizações']);
        Permissao::create(['submodulo_id' => 6, 'name' => 'customizes_create', 'description' => 'Criar Registro - Customizações']);
        Permissao::create(['submodulo_id' => 6, 'name' => 'customizes_show', 'description' => 'Visualizar Registro - Customizações']);
        Permissao::create(['submodulo_id' => 6, 'name' => 'customizes_edit', 'description' => 'Editar Registro - Customizações']);
        Permissao::create(['submodulo_id' => 6, 'name' => 'customizes_destroy', 'description' => 'Deletar Registro - Customizações']);

        Permissao::create(['submodulo_id' => 7, 'name' => 'notificacoes_list', 'description' => 'Visualizar Registro - Notificações']);
        Permissao::create(['submodulo_id' => 7, 'name' => 'notificacoes_create', 'description' => 'Criar Registro - Notificações']);
        Permissao::create(['submodulo_id' => 7, 'name' => 'notificacoes_show', 'description' => 'Visualizar Registro - Notificações']);
        Permissao::create(['submodulo_id' => 7, 'name' => 'notificacoes_edit', 'description' => 'Editar Registro - Notificações']);
        Permissao::create(['submodulo_id' => 7, 'name' => 'notificacoes_destroy', 'description' => 'Deletar Registro - Notificações']);

        Permissao::create(['submodulo_id' => 8, 'name' => 'transacoes_list', 'description' => 'Visualizar Registro - Transações']);
        Permissao::create(['submodulo_id' => 8, 'name' => 'transacoes_create', 'description' => 'Criar Registro - Transações']);
        Permissao::create(['submodulo_id' => 8, 'name' => 'transacoes_show', 'description' => 'Visualizar Registro - Transações']);
        Permissao::create(['submodulo_id' => 8, 'name' => 'transacoes_edit', 'description' => 'Editar Registro - Transações']);
        Permissao::create(['submodulo_id' => 8, 'name' => 'transacoes_destroy', 'description' => 'Deletar Registro - Transações']);

        Permissao::create(['submodulo_id' => 9, 'name' => 'ferramentas_list', 'description' => 'Visualizar Registro - Ferramentas']);
        Permissao::create(['submodulo_id' => 9, 'name' => 'ferramentas_create', 'description' => 'Criar Registro - Ferramentas']);
        Permissao::create(['submodulo_id' => 9, 'name' => 'ferramentas_show', 'description' => 'Visualizar Registro - Ferramentas']);
        Permissao::create(['submodulo_id' => 9, 'name' => 'ferramentas_edit', 'description' => 'Editar Registro - Ferramentas']);
        Permissao::create(['submodulo_id' => 9, 'name' => 'ferramentas_destroy', 'description' => 'Deletar Registro - Ferramentas']);

        Permissao::create(['submodulo_id' => 10, 'name' => 'escolas_list', 'description' => 'Visualizar Registro - Escolas']);
        Permissao::create(['submodulo_id' => 10, 'name' => 'escolas_create', 'description' => 'Criar Registro - Escolas']);
        Permissao::create(['submodulo_id' => 10, 'name' => 'escolas_show', 'description' => 'Visualizar Registro - Escolas']);
        Permissao::create(['submodulo_id' => 10, 'name' => 'escolas_edit', 'description' => 'Editar Registro - Escolas']);
        Permissao::create(['submodulo_id' => 10, 'name' => 'escolas_destroy', 'description' => 'Deletar Registro - Escolas']);

        Permissao::create(['submodulo_id' => 11, 'name' => 'departamentos_list', 'description' => 'Visualizar Registro - Departamentos']);
        Permissao::create(['submodulo_id' => 11, 'name' => 'departamentos_create', 'description' => 'Criar Registro - Departamentos']);
        Permissao::create(['submodulo_id' => 11, 'name' => 'departamentos_show', 'description' => 'Visualizar Registro - Departamentos']);
        Permissao::create(['submodulo_id' => 11, 'name' => 'departamentos_edit', 'description' => 'Editar Registro - Departamentos']);
        Permissao::create(['submodulo_id' => 11, 'name' => 'departamentos_destroy', 'description' => 'Deletar Registro - Departamentos']);

        Permissao::create(['submodulo_id' => 12, 'name' => 'estados_civis_list', 'description' => 'Visualizar Registro - Estados Civis']);
        Permissao::create(['submodulo_id' => 12, 'name' => 'estados_civis_create', 'description' => 'Criar Registro - Estados Civis']);
        Permissao::create(['submodulo_id' => 12, 'name' => 'estados_civis_show', 'description' => 'Visualizar Registro - Estados Civis']);
        Permissao::create(['submodulo_id' => 12, 'name' => 'estados_civis_edit', 'description' => 'Editar Registro - Estados Civis']);
        Permissao::create(['submodulo_id' => 12, 'name' => 'estados_civis_destroy', 'description' => 'Deletar Registro - Estados Civis']);

        Permissao::create(['submodulo_id' => 13, 'name' => 'nacionalidades_list', 'description' => 'Visualizar Registro - Nacionalidades']);
        Permissao::create(['submodulo_id' => 13, 'name' => 'nacionalidades_create', 'description' => 'Criar Registro - Nacionalidades']);
        Permissao::create(['submodulo_id' => 13, 'name' => 'nacionalidades_show', 'description' => 'Visualizar Registro - Nacionalidades']);
        Permissao::create(['submodulo_id' => 13, 'name' => 'nacionalidades_edit', 'description' => 'Editar Registro - Nacionalidades']);
        Permissao::create(['submodulo_id' => 13, 'name' => 'nacionalidades_destroy', 'description' => 'Deletar Registro - Nacionalidades']);

        Permissao::create(['submodulo_id' => 14, 'name' => 'escolaridades_list', 'description' => 'Visualizar Registro - Escolaridades']);
        Permissao::create(['submodulo_id' => 14, 'name' => 'escolaridades_create', 'description' => 'Criar Registro - Escolaridades']);
        Permissao::create(['submodulo_id' => 14, 'name' => 'escolaridades_show', 'description' => 'Visualizar Registro - Escolaridades']);
        Permissao::create(['submodulo_id' => 14, 'name' => 'escolaridades_edit', 'description' => 'Editar Registro - Escolaridades']);
        Permissao::create(['submodulo_id' => 14, 'name' => 'escolaridades_destroy', 'description' => 'Deletar Registro - Escolaridades']);

        Permissao::create(['submodulo_id' => 15, 'name' => 'naturalidades_list', 'description' => 'Visualizar Registro - Naturalidades']);
        Permissao::create(['submodulo_id' => 15, 'name' => 'naturalidades_create', 'description' => 'Criar Registro - Naturalidades']);
        Permissao::create(['submodulo_id' => 15, 'name' => 'naturalidades_show', 'description' => 'Visualizar Registro - Naturalidades']);
        Permissao::create(['submodulo_id' => 15, 'name' => 'naturalidades_edit', 'description' => 'Editar Registro - Naturalidades']);
        Permissao::create(['submodulo_id' => 15, 'name' => 'naturalidades_destroy', 'description' => 'Deletar Registro - Naturalidades']);

        Permissao::create(['submodulo_id' => 16, 'name' => 'generos_list', 'description' => 'Visualizar Registro - Gêneros']);
        Permissao::create(['submodulo_id' => 16, 'name' => 'generos_create', 'description' => 'Criar Registro - Gêneros']);
        Permissao::create(['submodulo_id' => 16, 'name' => 'generos_show', 'description' => 'Visualizar Registro - Gêneros']);
        Permissao::create(['submodulo_id' => 16, 'name' => 'generos_edit', 'description' => 'Editar Registro - Gêneros']);
        Permissao::create(['submodulo_id' => 16, 'name' => 'generos_destroy', 'description' => 'Deletar Registro - Gêneros']);

        Permissao::create(['submodulo_id' => 17, 'name' => 'funcoes_list', 'description' => 'Visualizar Registro - Funções']);
        Permissao::create(['submodulo_id' => 17, 'name' => 'funcoes_create', 'description' => 'Criar Registro - Funções']);
        Permissao::create(['submodulo_id' => 17, 'name' => 'funcoes_show', 'description' => 'Visualizar Registro - Funções']);
        Permissao::create(['submodulo_id' => 17, 'name' => 'funcoes_edit', 'description' => 'Editar Registro - Funções']);
        Permissao::create(['submodulo_id' => 17, 'name' => 'funcoes_destroy', 'description' => 'Deletar Registro - Funções']);

        Permissao::create(['submodulo_id' => 18, 'name' => 'funcionarios_list', 'description' => 'Visualizar Registro - Funcionários']);
        Permissao::create(['submodulo_id' => 18, 'name' => 'funcionarios_create', 'description' => 'Criar Registro - Funcionários']);
        Permissao::create(['submodulo_id' => 18, 'name' => 'funcionarios_show', 'description' => 'Visualizar Registro - Funcionários']);
        Permissao::create(['submodulo_id' => 18, 'name' => 'funcionarios_edit', 'description' => 'Editar Registro - Funcionários']);
        Permissao::create(['submodulo_id' => 18, 'name' => 'funcionarios_destroy', 'description' => 'Deletar Registro - Funcionários']);

        Permissao::create(['submodulo_id' => 19, 'name' => 'identidade_orgaos_list', 'description' => 'Visualizar Registro - Órgãos Identidades']);
        Permissao::create(['submodulo_id' => 19, 'name' => 'identidade_orgaos_create', 'description' => 'Criar Registro - Órgãos Identidades']);
        Permissao::create(['submodulo_id' => 19, 'name' => 'identidade_orgaos_show', 'description' => 'Visualizar Registro - Órgãos Identidades']);
        Permissao::create(['submodulo_id' => 19, 'name' => 'identidade_orgaos_edit', 'description' => 'Editar Registro - Órgãos Identidades']);
        Permissao::create(['submodulo_id' => 19, 'name' => 'identidade_orgaos_destroy', 'description' => 'Deletar Registro - Órgãos Identidades']);

        Permissao::create(['submodulo_id' => 20, 'name' => 'professores_list', 'description' => 'Visualizar Registro - Professores']);
        Permissao::create(['submodulo_id' => 20, 'name' => 'professores_create', 'description' => 'Criar Registro - Professores']);
        Permissao::create(['submodulo_id' => 20, 'name' => 'professores_show', 'description' => 'Visualizar Registro - Professores']);
        Permissao::create(['submodulo_id' => 20, 'name' => 'professores_edit', 'description' => 'Editar Registro - Professores']);
        Permissao::create(['submodulo_id' => 20, 'name' => 'professores_destroy', 'description' => 'Deletar Registro - Professores']);

        Permissao::create(['submodulo_id' => 21, 'name' => 'dashboards_list', 'description' => 'Visualizar Registro - Dashboards']);
        Permissao::create(['submodulo_id' => 21, 'name' => 'dashboards_create', 'description' => 'Criar Registro - Dashboards']);
        Permissao::create(['submodulo_id' => 21, 'name' => 'dashboards_show', 'description' => 'Visualizar Registro - Dashboards']);
        Permissao::create(['submodulo_id' => 21, 'name' => 'dashboards_edit', 'description' => 'Editar Registro - Dashboards']);
        Permissao::create(['submodulo_id' => 21, 'name' => 'dashboards_destroy', 'description' => 'Deletar Registro - Dashboards']);

        Permissao::create(['submodulo_id' => 22, 'name' => 'alunos_list', 'description' => 'Visualizar Registro - Alunos']);
        Permissao::create(['submodulo_id' => 22, 'name' => 'alunos_create', 'description' => 'Criar Registro - Alunos']);
        Permissao::create(['submodulo_id' => 22, 'name' => 'alunos_show', 'description' => 'Visualizar Registro - Alunos']);
        Permissao::create(['submodulo_id' => 22, 'name' => 'alunos_edit', 'description' => 'Editar Registro - Alunos']);
        Permissao::create(['submodulo_id' => 22, 'name' => 'alunos_destroy', 'description' => 'Deletar Registro - Alunos']);

        Permissao::create(['submodulo_id' => 24, 'name' => 'users_perfil_show', 'description' => 'Visualizar Registro - Usuários Perfil']);
        Permissao::create(['submodulo_id' => 24, 'name' => 'users_perfil_edit', 'description' => 'Editar Registro - Usuários Perfil']);

        Permissao::create(['submodulo_id' => 25, 'name' => 'tipos_escolas_list', 'description' => 'Visualizar Registro - Tipos Escolas']);
        Permissao::create(['submodulo_id' => 25, 'name' => 'tipos_escolas_create', 'description' => 'Criar Registro - Tipos Escolas']);
        Permissao::create(['submodulo_id' => 25, 'name' => 'tipos_escolas_show', 'description' => 'Visualizar Registro - Tipos Escolas']);
        Permissao::create(['submodulo_id' => 25, 'name' => 'tipos_escolas_edit', 'description' => 'Editar Registro - Tipos Escolas']);
        Permissao::create(['submodulo_id' => 25, 'name' => 'tipos_escolas_destroy', 'description' => 'Deletar Registro - Tipos Escolas']);

        Permissao::create(['submodulo_id' => 26, 'name' => 'niveis_ensinos_list', 'description' => 'Visualizar Registro - Níveis Ensinos']);
        Permissao::create(['submodulo_id' => 26, 'name' => 'niveis_ensinos_create', 'description' => 'Criar Registro - Níveis Ensinos']);
        Permissao::create(['submodulo_id' => 26, 'name' => 'niveis_ensinos_show', 'description' => 'Visualizar Registro - Níveis Ensinos']);
        Permissao::create(['submodulo_id' => 26, 'name' => 'niveis_ensinos_edit', 'description' => 'Editar Registro - Níveis Ensinos']);
        Permissao::create(['submodulo_id' => 26, 'name' => 'niveis_ensinos_destroy', 'description' => 'Deletar Registro - Níveis Ensinos']);

        Permissao::create(['submodulo_id' => 27, 'name' => 'turmas_list', 'description' => 'Visualizar Registro - Turmas']);
        Permissao::create(['submodulo_id' => 27, 'name' => 'turmas_create', 'description' => 'Criar Registro - Turmas']);
        Permissao::create(['submodulo_id' => 27, 'name' => 'turmas_show', 'description' => 'Visualizar Registro - Turmas']);
        Permissao::create(['submodulo_id' => 27, 'name' => 'turmas_edit', 'description' => 'Editar Registro - Turmas']);
        Permissao::create(['submodulo_id' => 27, 'name' => 'turmas_destroy', 'description' => 'Deletar Registro - Turmas']);

        Permissao::create(['submodulo_id' => 28, 'name' => 'nees_list', 'description' => 'Visualizar Registro - Necessidades Educacionais Específicas']);
        Permissao::create(['submodulo_id' => 28, 'name' => 'nees_create', 'description' => 'Criar Registro - Necessidades Educacionais Específicas']);
        Permissao::create(['submodulo_id' => 28, 'name' => 'nees_show', 'description' => 'Visualizar Registro - Necessidades Educacionais Específicas']);
        Permissao::create(['submodulo_id' => 28, 'name' => 'nees_edit', 'description' => 'Editar Registro - Necessidades Educacionais Específicas']);
        Permissao::create(['submodulo_id' => 28, 'name' => 'nees_destroy', 'description' => 'Deletar Registro - Necessidades Educacionais Específicas']);

        Permissao::create(['submodulo_id' => 29, 'name' => 'avaliacoes_list', 'description' => 'Visualizar Registro - Avalie-nos']);
        Permissao::create(['submodulo_id' => 29, 'name' => 'avaliacoes_create', 'description' => 'Criar Registro - Avalie-nos']);
        Permissao::create(['submodulo_id' => 29, 'name' => 'avaliacoes_show', 'description' => 'Visualizar Registro - Avalie-nos']);
        Permissao::create(['submodulo_id' => 29, 'name' => 'avaliacoes_edit', 'description' => 'Editar Registro - Avalie-nos']);
        Permissao::create(['submodulo_id' => 29, 'name' => 'avaliacoes_destroy', 'description' => 'Deletar Registro - Avalie-nos']);

        Permissao::create(['submodulo_id' => 30, 'name' => 'calendarios_inclusivos_list', 'description' => 'Visualizar Registro - Calendário Inclusivo']);
        Permissao::create(['submodulo_id' => 30, 'name' => 'calendarios_inclusivos_create', 'description' => 'Criar Registro - Calendário Inclusivo']);
        Permissao::create(['submodulo_id' => 30, 'name' => 'calendarios_inclusivos_show', 'description' => 'Visualizar Registro - Calendário Inclusivo']);
        Permissao::create(['submodulo_id' => 30, 'name' => 'calendarios_inclusivos_edit', 'description' => 'Editar Registro - Calendário Inclusivo']);
        Permissao::create(['submodulo_id' => 30, 'name' => 'calendarios_inclusivos_destroy', 'description' => 'Deletar Registro - Calendário Inclusivo']);

        Permissao::create(['submodulo_id' => 31, 'name' => 'espacos_colaboracoes_list', 'description' => 'Visualizar Registro - Espaços Colaborações']);
        Permissao::create(['submodulo_id' => 31, 'name' => 'espacos_colaboracoes_create', 'description' => 'Criar Registro - Espaços Colaborações']);
        Permissao::create(['submodulo_id' => 31, 'name' => 'espacos_colaboracoes_show', 'description' => 'Visualizar Registro - Espaços Colaborações']);
        Permissao::create(['submodulo_id' => 31, 'name' => 'espacos_colaboracoes_edit', 'description' => 'Editar Registro - Espaços Colaborações']);
        Permissao::create(['submodulo_id' => 31, 'name' => 'espacos_colaboracoes_destroy', 'description' => 'Deletar Registro - Espaços Colaborações']);

        Permissao::create(['submodulo_id' => 32, 'name' => 'sobre_produto_list', 'description' => 'Visualizar Registro - Sobre o Produto Educacional']);
        Permissao::create(['submodulo_id' => 32, 'name' => 'sobre_produto_edit', 'description' => 'Editar Registro - Sobre o Produto Educacional']);

        Permissao::create(['submodulo_id' => 33, 'name' => 'mensagens_list', 'description' => 'Visualizar Registro - Mensagens']);

        //Mobile
        Permissao::create(['id' => 1000, 'submodulo_id' => 200, 'name' => 'mobile_list', 'description' => 'Visualizar Registro - Mobile']);
        Permissao::create(['id' => 1001, 'submodulo_id' => 200, 'name' => 'mobile_create', 'description' => 'Criar Registro - Mobile']);
        Permissao::create(['id' => 1002, 'submodulo_id' => 200, 'name' => 'mobile_show', 'description' => 'Visualizar Registro - Mobile']);
        Permissao::create(['id' => 1003, 'submodulo_id' => 200, 'name' => 'mobile_edit', 'description' => 'Editar Registro - Mobile']);
        Permissao::create(['id' => 1004, 'submodulo_id' => 200, 'name' => 'mobile_destroy', 'description' => 'Deletar Registro - Mobile']);

        Permissao::create(['id' => 1005, 'submodulo_id' => 201, 'name' => 'mobile_escolas_list', 'description' => 'Visualizar Registro - Mobile Escolas']);
        Permissao::create(['id' => 1006, 'submodulo_id' => 201, 'name' => 'mobile_escolas_create', 'description' => 'Criar Registro - Mobile Escolas']);
        Permissao::create(['id' => 1007, 'submodulo_id' => 201, 'name' => 'mobile_escolas_show', 'description' => 'Visualizar Registro - Mobile Escolas']);
        Permissao::create(['id' => 1008, 'submodulo_id' => 201, 'name' => 'mobile_escolas_edit', 'description' => 'Editar Registro - Mobile Escolas']);
        Permissao::create(['id' => 1009, 'submodulo_id' => 201, 'name' => 'mobile_escolas_destroy', 'description' => 'Deletar Registro - Mobile Escolas']);

        Permissao::create(['id' => 1010, 'submodulo_id' => 202, 'name' => 'mobile_nees_list', 'description' => 'Visualizar Registro - Mobile Necessidades Educacionais Específicas']);
        Permissao::create(['id' => 1011, 'submodulo_id' => 202, 'name' => 'mobile_nees_create', 'description' => 'Criar Registro - Mobile Necessidades Educacionais Específicas']);
        Permissao::create(['id' => 1012, 'submodulo_id' => 202, 'name' => 'mobile_nees_show', 'description' => 'Visualizar Registro - Mobile Necessidades Educacionais Específicas']);
        Permissao::create(['id' => 1013, 'submodulo_id' => 202, 'name' => 'mobile_nees_edit', 'description' => 'Editar Registro - Mobile Necessidades Educacionais Específicas']);
        Permissao::create(['id' => 1014, 'submodulo_id' => 202, 'name' => 'mobile_nees_destroy', 'description' => 'Deletar Registro - Mobile Necessidades Educacionais Específicas']);
    }
}
