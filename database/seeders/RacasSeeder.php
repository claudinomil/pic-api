<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacasSeeder extends Seeder
{
    public function run()
    {
        //criando
        DB::table('racas')->insert([
            ['name' => 'Branca'],
            ['name' => 'Preta'],
            ['name' => 'Parda'],
            ['name' => 'Indígena'],
            ['name' => 'Amarela']
        ]);
    }
}
