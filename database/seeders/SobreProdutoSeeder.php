<?php

namespace Database\Seeders;

use App\Models\SobreProduto;
use Illuminate\Database\Seeder;

class SobreProdutoSeeder extends Seeder
{
    public function run()
    {
        SobreProduto::create(['descricao' => 'Sobre Produto', 'created_at' => now()]);
    }
}
