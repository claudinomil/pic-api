<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Genero;
use App\Models\Grupo;
use App\Models\EstadoCivil;
use App\Models\Nacionalidade;
use App\Models\Funcao;
use App\Models\Professor;
use App\Models\Situacao;
use App\Models\Transacao;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Z_FakerSeeder extends Seeder
{
    public function run()
    {
        //Fake pt_BR
        $faker = \Faker\Factory::create('pt_BR');

        //Users
        for($i=1; $i<=20; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('claudino1971'),
                'email_verified_at' => '2023-06-02 12:00:00',
                'user_confirmed_at' => '2023-06-02 12:00:00',
                'avatar' => 'build/assets/images/users/avatar-0.png',
                'layout_mode' => 'layout_mode_light',
                'layout_style' => 'layout_style_vertical_scrollable',
                'grupo_id' => $faker->numberBetween(1, 5),
                'situacao_id' => $faker->numberBetween(1, 2),
                'sistema_acesso_id' => $faker->numberBetween(1, 3),
                'created_at' => now()
            ]);
        }

        //Escolas
        for($i=1; $i<=20; $i++) {
            Escola::create([
                'name' => $faker->company,
                'tipo_escola_id' => $faker->numberBetween(1, 4),
                'created_at' => now()
            ]);
        }

        //Professor Claudino
        Professor::create([
            'id' => 1,
            'name' => 'Claudino Mil Homens de Moraes',
            'data_nascimento' => '1971-06-02',
            'genero_id' => 1,
            'estado_civil_id' => 2,
            'escolaridade_id' => 10,
            'nacionalidade_id' => 7,
            'naturalidade_id' => 19,
            'email' => 'claudinomoraes@yahoo.com.br',
            'cpf' => '01798241714',
            'data_admissao' => '2000-10-10',
            'foto' => 'build/assets/images/professores/professor-0.png',
            'created_at' => now()
        ]);

        //Colocar Professor Claudino no Usuário Claudino
        $userClaudino = User::find(1);
        $userClaudino->update(['professor_id' => 1]);

        //Professor Davinni
        Professor::create([
            'id' => 2,
            'name' => 'Davinni',
            'data_nascimento' => '1990-06-02',
            'genero_id' => 2,
            'estado_civil_id' => 2,
            'escolaridade_id' => 10,
            'nacionalidade_id' => 7,
            'naturalidade_id' => 19,
            'email' => 'davinni@inclusaocolaborativa.com.br',
            'cpf' => '14684433480',
            'data_admissao' => '2000-10-10',
            'foto' => 'build/assets/images/professores/professor-0.png',
            'created_at' => now()
        ]);

        //Colocar Professor Davinni no Usuário Davinni
        $userDavinni = User::find(2);
        $userDavinni->update(['professor_id' => 2]);

        //Professores Aleatórios
        for($i=1; $i<=20; $i++) {
            Professor::create([
                'name' => $faker->name,
                'data_nascimento' => $faker->date,
                'genero_id' => $faker->numberBetween(1, 2),
                'estado_civil_id' => $faker->numberBetween(1, 4),
                'escolaridade_id' => $faker->numberBetween(1, 4),
                'nacionalidade_id' => $faker->numberBetween(1, 4),
                'naturalidade_id' => $faker->numberBetween(1, 4),
                'email' => $faker->email,
                'cpf' => $faker->cpf(false),
                'data_admissao' => $faker->date,
                'foto' => 'build/assets/images/professores/professor-0.png',
                'created_at' => now()
            ]);
        }

        //Turmas
        for($i=1; $i<=20; $i++) {
            Turma::create([
                'name' => $faker->city,
                'escola_id' => $faker->numberBetween(1, 20),
                'nivel_ensino_id' => $faker->numberBetween(1, 3),
                'professor_id' => $faker->numberBetween(1, 20),
                'quantidade_alunos' => $faker->numberBetween(10, 20),
                'sala' => $faker->numberBetween(101, 601),
                'created_at' => now()
            ]);
        }

        //Alunos
        for($i=1; $i<=20; $i++) {
            Aluno::create([
                'name' => $faker->name,
                'data_nascimento' => $faker->date('d/m/Y'),
                'genero_id' => $faker->numberBetween(1, 2),
                'turma_id' => $faker->numberBetween(1, 4),
                'data_matricula' => $faker->date('d/m/Y'),
                'raca_id' => $faker->numberBetween(1, 4),
                'nacionalidade_id' => $faker->numberBetween(1, 4),
                'naturalidade_id' => $faker->numberBetween(1, 4),
                'cpf' => $faker->cpf(false),
                'foto' => 'build/assets/images/alunos/aluno-0.png',
                'created_at' => now()
            ]);
        }

        //Transações
        for($i=1; $i<=600; $i++) {
            Transacao::create([
                'date' => $faker->date,
                'time' => $faker->time,
                'user_id' => $faker->numberBetween(1, 20),
                'operacao_id' => $faker->numberBetween(1, 3),
                'submodulo_id' => $faker->numberBetween(1, 22),
                'dados' => 'Populando via Seeder'
            ]);
        }

        //Grupos
        DB::table('grupos')->insert([
            'name' => 'Usuários'
        ]);

        DB::table('grupos')->insert([
            'name' => 'Administrador'
        ]);

        //Funcoes
        DB::table('funcoes')->insert([
            'name' => 'Gerente'
        ]);

        DB::table('funcoes')->insert([
            'name' => 'Supervisor'
        ]);

        DB::table('funcoes')->insert([
            'name' => 'Brigadista'
        ]);

        //Users
        for ($i=0; $i<50; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('11111111'),
                'email_verified_at'=>'2022-06-02 12:00:00',
                'avatar' => 'build/assets/images/users/avatar-0.png',
                'layout_mode' => 'layout_mode_light',
                'layout_style' => 'layout_style_vertical_scrollable',
                'grupo_id' => Grupo::all()->random()->id,
                'situacao_id' => Situacao::all()->random()->id,
                'created_at' => now()
            ]);
        }

        //Funcionarios
        for ($i=0; $i<150; $i++) {
            $cpf = $faker->cpf;
            $cpf = str_replace('.', '', $cpf);
            $cpf = str_replace('.', '', $cpf);
            $cpf = str_replace('.', '', $cpf);
            $cpf = str_replace('-', '', $cpf);

            DB::table('funcionarios')->insert([
                'name' => $faker->name,
                'data_nascimento' => $faker->date,
                'funcao_id' => Funcao::all()->random()->id,
                'genero_id' => Genero::all()->random()->id,
                'estado_civil_id' => EstadoCivil::all()->random()->id,
                'nacionalidade_id' => Nacionalidade::all()->random()->id,
                'email' => $faker->email,
                'cpf' => $cpf,
                'data_admissao' => $faker->date
            ]);
        }


    }
}
