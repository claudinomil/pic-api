<?php

namespace Database\Seeders;

use App\Models\Turma;
use Illuminate\Database\Seeder;

class TurmasSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');

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
    }
}
