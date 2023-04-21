<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Transacao;
use Illuminate\Database\Seeder;

class TransacoesSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');

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
    }
}
