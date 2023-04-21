<?php

namespace Database\Seeders;

use App\Models\Deficiencia;
use Illuminate\Database\Seeder;

class DeficienciasSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');

        for($i=1; $i<=20; $i++) {
            Deficiencia::create([
                'name' => $faker->slug,
                'created_at' => now()
            ]);
        }
    }
}
