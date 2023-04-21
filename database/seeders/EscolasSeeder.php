<?php

namespace Database\Seeders;

use App\Models\Escola;
use Illuminate\Database\Seeder;

class EscolasSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');

        for($i=1; $i<=20; $i++) {
            Escola::create([
                'name' => $faker->company,
                'tipo_escola_id' => $faker->numberBetween(1, 4),
                'created_at' => now()
            ]);
        }
    }
}
