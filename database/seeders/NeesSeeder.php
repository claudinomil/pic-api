<?php

namespace Database\Seeders;

use App\Models\Nee;
use Illuminate\Database\Seeder;

class NeesSeeder extends Seeder
{
    public function run()
    {
        Nee::create([
            'name' => 'Autismo',
            'created_at' => now()
        ]);

        Nee::create([
            'name' => 'Síndrome de Down',
            'created_at' => now()
        ]);

        Nee::create([
            'name' => 'Superdotação',
            'created_at' => now()
        ]);

        Nee::create([
            'name' => 'NEE Intelectual',
            'created_at' => now()
        ]);


//        $faker = \Faker\Factory::create('pt_BR');
//
//        for($i=1; $i<=20; $i++) {
//            Nee::create([
//                'name' => $faker->slug,
//                'created_at' => now()
//            ]);
//        }



    }
}
