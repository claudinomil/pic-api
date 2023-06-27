<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
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
            EscolasSeeder::class,
            ProfessoresSeeder::class,
            TurmasSeeder::class,
            AlunosSeeder::class,
            TransacoesSeeder::class,
            NeesSeeder::class,
            SobreProdutoSeeder::class
        ]);
    }
}
