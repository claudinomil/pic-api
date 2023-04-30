<?php

namespace Database\Seeders;

use App\Models\Deficiencia;
use Illuminate\Database\Seeder;

class DeficienciasSeeder extends Seeder
{
    public function run()
    {
        Deficiencia::create([
            'name' => 'Autismo',
            'created_at' => now()
        ]);

        Deficiencia::create([
            'name' => 'Síndrome de Down',
            'created_at' => now()
        ]);

        Deficiencia::create([
            'name' => 'Superdotação',
            'created_at' => now()
        ]);

        Deficiencia::create([
            'name' => 'Deficiência Intelectual',
            'created_at' => now()
        ]);


//        $faker = \Faker\Factory::create('pt_BR');
//
//        for($i=1; $i<=20; $i++) {
//            Deficiencia::create([
//                'name' => $faker->slug,
//                'created_at' => now()
//            ]);
//        }



    }
}
