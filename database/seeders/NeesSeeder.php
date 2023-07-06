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
    }
}
