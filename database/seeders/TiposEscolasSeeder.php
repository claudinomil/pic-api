<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposEscolasSeeder extends Seeder
{
    public function run()
    {
        //criando
        DB::table('tipos_escolas')->insert([
            ['name' => 'Escola Municipal', 'ordenacao' => 1],
            ['name' => 'Escola Estadual', 'ordenacao' => 2],
            ['name' => 'Escola Federal', 'ordenacao' => 3],
            ['name' => 'Escola Particular', 'ordenacao' => 4]
        ]);
    }
}
