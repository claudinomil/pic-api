<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;

class AlunosSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');

        for($i=1; $i<=20; $i++) {
            Aluno::create([
                'name' => $faker->name,
                'data_nascimento' => $faker->date,
                'genero_id' => $faker->numberBetween(1, 2),
                'turma_id' => $faker->numberBetween(1, 4),
                'raca_id' => $faker->numberBetween(1, 4),
                'nacionalidade_id' => $faker->numberBetween(1, 4),
                'naturalidade_id' => $faker->numberBetween(1, 4),
                'cpf' => $faker->cpf(false),
                'foto' => 'build/assets/images/alunos/aluno-0.png',
                'created_at' => now()
            ]);
        }
    }
}
