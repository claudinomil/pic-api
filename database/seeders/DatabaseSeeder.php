<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        //Início
        if (Modulo::all()->count() <= 0) {
            $this->call([
                ModulosSeeder::class,
                SubmodulosSeeder::class,
                GenerosSeeder::class,
                EstadosCivisSeeder::class,
                IdentidadeOrgaosSeeder::class,
                NacionalidadesSeeder::class,
                NaturalidadesSeeder::class,
                EscolaridadesSeeder::class,
                TelephoneDddsSeeder::class,
                TelephoneDdisSeeder::class,
                GruposSeeder::class,
                PermissoesSeeder::class,
                GrupoPermissoesSeeder::class,
                SituacoesSeeder::class,
                OperacoesSeeder::class,
                SistemaAcessosSeeder::class,
                EstadosSeeder::class,
                UsersSeeder::class,
                TiposEscolasSeeder::class,
                NiveisEnsinosSeeder::class,
                RacasSeeder::class,
                NeesSeeder::class,
                SobreProdutoSeeder::class
            ]);
        }
    }
}
