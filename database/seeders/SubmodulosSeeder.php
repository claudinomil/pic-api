<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmodulosSeeder extends Seeder
{
    public function run()
    {
        DB::table('submodulos')->insert([
            ['id' => '1', 'modulo_id' => '1', 'name' => 'Módulos', 'menu_text' => 'Módulos', 'menu_url' => 'modulos', 'menu_route' => 'modulos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'modulos', 'prefix_route' => 'modulos', 'mobile' => 0, 'viewing_order' => 5],
            ['id' => '2', 'modulo_id' => '1', 'name' => 'Submódulos', 'menu_text' => 'Submódulos', 'menu_url' => 'submodulos', 'menu_route' => 'submodulos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'submodulos', 'prefix_route' => 'submodulos', 'mobile' => 0, 'viewing_order' => 10],
            ['id' => '3', 'modulo_id' => '6', 'name' => 'Home', 'menu_text' => 'Home', 'menu_url' => 'home', 'menu_route' => 'home', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'home', 'prefix_route' => 'home', 'mobile' => 0, 'viewing_order' => 0],
 	        ['id' => '4', 'modulo_id' => '6', 'name' => 'Grupos', 'menu_text' => 'Grupos', 'menu_url' => 'grupos', 'menu_route' => 'grupos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'grupos', 'prefix_route' => 'grupos', 'mobile' => 0, 'viewing_order' => 15],
            ['id' => '5', 'modulo_id' => '6', 'name' => 'Usuários', 'menu_text' => 'Usuários', 'menu_url' => 'users', 'menu_route' => 'users', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'users', 'prefix_route' => 'users', 'mobile' => 0, 'viewing_order' => 20],
            ['id' => '6', 'modulo_id' => '3', 'name' => 'Customização', 'menu_text' => 'Customização', 'menu_url' => 'customizes', 'menu_route' => 'customizes', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'customizes', 'prefix_route' => 'customizes', 'mobile' => 0, 'viewing_order' => 0],
            ['id' => '7', 'modulo_id' => '3', 'name' => 'Notificações', 'menu_text' => 'Notificações', 'menu_url' => 'notificacoes', 'menu_route' => 'notificacoes', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'notificacoes', 'prefix_route' => 'notificacoes', 'mobile' => 0, 'viewing_order' => 25],
            ['id' => '8', 'modulo_id' => '6', 'name' => 'Log de Transações', 'menu_text' => 'Log de Transações', 'menu_url' => 'transacoes', 'menu_route' => 'transacoes', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'transacoes', 'prefix_route' => 'transacoes', 'mobile' => 0, 'viewing_order' => 30],
            ['id' => '9', 'modulo_id' => '1', 'name' => 'Ferramentas', 'menu_text' => 'Ferramentas', 'menu_url' => 'ferramentas', 'menu_route' => 'ferramentas', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'ferramentas', 'prefix_route' => 'ferramentas', 'mobile' => 0, 'viewing_order' => 35],
            ['id' => '10', 'modulo_id' => '6', 'name' => 'Escolas', 'menu_text' => 'Escolas', 'menu_url' => 'escolas', 'menu_route' => 'escolas', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'escolas', 'prefix_route' => 'escolas', 'mobile' => 0, 'viewing_order' => 85],
            ['id' => '11', 'modulo_id' => '5', 'name' => 'Departamentos', 'menu_text' => 'Departamentos', 'menu_url' => 'departamentos', 'menu_route' => 'departamentos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'departamentos', 'prefix_route' => 'departamentos', 'mobile' => 0, 'viewing_order' => 45],
            ['id' => '12', 'modulo_id' => '5', 'name' => 'Estados Civis', 'menu_text' => 'Estados Civis', 'menu_url' => 'estados_civis', 'menu_route' => 'estados_civis', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'estados_civis', 'prefix_route' => 'estados_civis', 'mobile' => 0, 'viewing_order' => 50],
            ['id' => '13', 'modulo_id' => '5', 'name' => 'Nacionalidades', 'menu_text' => 'Nacionalidades', 'menu_url' => 'nacionalidades', 'menu_route' => 'nacionalidades', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'nacionalidades', 'prefix_route' => 'nacionalidades', 'mobile' => 0, 'viewing_order' => 55],
            ['id' => '14', 'modulo_id' => '5', 'name' => 'Escolaridades', 'menu_text' => 'Escolaridades', 'menu_url' => 'escolaridades', 'menu_route' => 'escolaridades', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'escolaridades', 'prefix_route' => 'escolaridades', 'mobile' => 0, 'viewing_order' => 60],
            ['id' => '15', 'modulo_id' => '5', 'name' => 'Naturalidades', 'menu_text' => 'Naturalidades', 'menu_url' => 'naturalidades', 'menu_route' => 'naturalidades', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'naturalidades', 'prefix_route' => 'naturalidades', 'mobile' => 0, 'viewing_order' => 65],
            ['id' => '16', 'modulo_id' => '5', 'name' => 'Gêneros', 'menu_text' => 'Gêneros', 'menu_url' => 'generos', 'menu_route' => 'generos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'generos', 'prefix_route' => 'generos', 'mobile' => 0, 'viewing_order' => 70],
            ['id' => '17', 'modulo_id' => '5', 'name' => 'Funções', 'menu_text' => 'Funções', 'menu_url' => 'funcoes', 'menu_route' => 'funcoes', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'funcoes', 'prefix_route' => 'funcoes', 'mobile' => 0, 'viewing_order' => 40],
            ['id' => '18', 'modulo_id' => '6', 'name' => 'Funcionários', 'menu_text' => 'Funcionários', 'menu_url' => 'funcionarios', 'menu_route' => 'funcionarios', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'funcionarios', 'prefix_route' => 'funcionarios', 'mobile' => 0, 'viewing_order' => 82],
            ['id' => '19', 'modulo_id' => '5', 'name' => 'Órgãos Identidades', 'menu_text' => 'Órgãos Identidades', 'menu_url' => 'identidade_orgaos', 'menu_route' => 'identidade_orgaos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'identidade_orgaos', 'prefix_route' => 'identidade_orgaos', 'mobile' => 0, 'viewing_order' => 80],
            ['id' => '20', 'modulo_id' => '6', 'name' => 'Professores', 'menu_text' => 'Professores', 'menu_url' => 'professores', 'menu_route' => 'professores', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'professores', 'prefix_route' => 'professores', 'mobile' => 0, 'viewing_order' => 87],
            ['id' => '21', 'modulo_id' => '6', 'name' => 'Dashboards', 'menu_text' => 'Dashboards', 'menu_url' => 'dashboards', 'menu_route' => 'dashboards', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'dashboards', 'prefix_route' => 'dashboards', 'mobile' => 0, 'viewing_order' => 1],
            ['id' => '22', 'modulo_id' => '2', 'name' => 'Alunos com NEE', 'menu_text' => 'Alunos com NEE', 'menu_url' => 'alunos', 'menu_route' => 'alunos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'alunos', 'prefix_route' => 'alunos', 'mobile' => 0, 'viewing_order' => 10],
            ['id' => '24', 'modulo_id' => '6', 'name' => 'Usuários Perfil', 'menu_text' => 'Usuários Perfil', 'menu_url' => 'users_perfil', 'menu_route' => 'users_perfil', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'users_perfil', 'prefix_route' => 'users_perfil', 'mobile' => 0, 'viewing_order' => 0],
            ['id' => '25', 'modulo_id' => '5', 'name' => 'Tipos Escolas', 'menu_text' => 'Tipos Escolas', 'menu_url' => 'tipos_escolas', 'menu_route' => 'tipos_escolas', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'tipos_escolas', 'prefix_route' => 'tipos_escolas', 'mobile' => 0, 'viewing_order' => 83],
            ['id' => '26', 'modulo_id' => '5', 'name' => 'Níveis Ensinos', 'menu_text' => 'Níveis Ensinos', 'menu_url' => 'niveis_ensinos', 'menu_route' => 'niveis_ensinos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'niveis_ensinos', 'prefix_route' => 'niveis_ensinos', 'mobile' => 0, 'viewing_order' => 84],
            ['id' => '27', 'modulo_id' => '6', 'name' => 'Turmas', 'menu_text' => 'Turmas', 'menu_url' => 'turmas', 'menu_route' => 'turmas', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'turmas', 'prefix_route' => 'turmas', 'mobile' => 0, 'viewing_order' => 88],
            ['id' => '28', 'modulo_id' => '2', 'name' => 'Necessidades Educacionais Específicas', 'menu_text' => 'Necessidades Educacionais Específicas', 'menu_url' => 'nees', 'menu_route' => 'nees', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'nees', 'prefix_route' => 'nees', 'mobile' => 0, 'viewing_order' => 20],
            ['id' => '29', 'modulo_id' => '2', 'name' => 'Avalie-nos', 'menu_text' => 'Avalie-nos', 'menu_url' => 'avaliacoes', 'menu_route' => 'avaliacoes', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'avaliacoes', 'prefix_route' => 'avaliacoes', 'mobile' => 0, 'viewing_order' => 120],
            ['id' => '30', 'modulo_id' => '2', 'name' => 'Calendário Inclusivo', 'menu_text' => 'Calendário Inclusivo', 'menu_url' => 'calendarios_inclusivos', 'menu_route' => 'calendarios_inclusivos', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'calendarios_inclusivos', 'prefix_route' => 'calendarios_inclusivos', 'mobile' => 0, 'viewing_order' => 30],

            //Mobile
            ['id' => '200', 'modulo_id' => '6', 'name' => 'Mobile', 'menu_text' => 'Mobile', 'menu_url' => 'mobile', 'menu_route' => 'mobile', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'mobile', 'prefix_route' => 'mobile', 'mobile' => 1, 'viewing_order' => 0],
            ['id' => '201', 'modulo_id' => '6', 'name' => 'Escolas', 'menu_text' => 'Escolas', 'menu_url' => 'mobile_escolas', 'menu_route' => 'mobile_escolas', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'mobile_escolas', 'prefix_route' => 'mobile_escolas', 'mobile' => 1, 'viewing_order' => 10],
            ['id' => '202', 'modulo_id' => '6', 'name' => 'Necessidades Educacionais Específicas', 'menu_text' => 'Necessidades Educacionais Específicas', 'menu_url' => 'mobile_nees', 'menu_route' => 'mobile_nees', 'menu_icon' => 'fas fa-angle-right', 'prefix_permissao' => 'mobile_nees', 'prefix_route' => 'mobile_nees', 'mobile' => 1, 'viewing_order' => 20],
        ]);
    }
}
