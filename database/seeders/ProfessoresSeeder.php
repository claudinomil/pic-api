<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Seeder;

class ProfessoresSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');

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
    }
}
