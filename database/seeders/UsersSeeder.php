<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Criando Usuario
        $user = \App\Models\User::factory()->create([
            'name' => 'Claudino Mil Homens de Moraes',
            'email' => 'claudinomoraes@yahoo.com.br',
            'password' => Hash::make('claudino1971'),
            'email_verified_at'=>'2023-06-02 12:00:00',
            'user_confirmed_at' => '2023-06-02 12:00:00',
            'avatar' => 'build/assets/images/users/avatar-0.png',
            'layout_mode' => 'layout_mode_light',
            'layout_style' => 'layout_style_vertical_scrollable',
            'grupo_id' => '1',
            'situacao_id' => '1',
            'sistema_acesso_id' => 3,
            'created_at' => now()
        ]);

        $faker = \Faker\Factory::create('pt_BR');

        for($i=1; $i<=20; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('claudino1971'),
                'email_verified_at' => '2023-06-02 12:00:00',
                'user_confirmed_at' => '2023-06-02 12:00:00',
                'avatar' => 'build/assets/images/users/avatar-0.png',
                'layout_mode' => 'layout_mode_light',
                'layout_style' => 'layout_style_vertical_scrollable',
                'grupo_id' => $faker->numberBetween(1, 5),
                'situacao_id' => $faker->numberBetween(1, 2),
                'sistema_acesso_id' => $faker->numberBetween(1, 3),
                'created_at' => now()
            ]);
        }
    }
}
