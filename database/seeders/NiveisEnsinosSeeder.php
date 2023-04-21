<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveisEnsinosSeeder extends Seeder
{
    public function run()
    {
        //criando
        DB::table('niveis_ensinos')->insert([
            ['name' => 'Ensino Infantil', 'ordenacao' => 1],
            ['name' => 'Ensino Fundamental', 'ordenacao' => 2],
            ['name' => 'Ensino Médio', 'ordenacao' => 3]
        ]);
    }
}
