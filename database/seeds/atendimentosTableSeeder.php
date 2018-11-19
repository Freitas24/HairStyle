<?php

use Illuminate\Database\Seeder;
use App\atendimento;

class atendimentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        atendimento::create([
            'atendimento_id' => 'Cortar o cabelo',
            'diahora' => '2018-11-05 13:30:00',
            'user_id' => 1
        ]);

        atendimento::create([
            'atendimento_id' => 'Pintar o cabelo e tirar a sobrancelha',
            'diahora' => '2018-11-05 14:00:00',
            'user_id' => 2
        ]);

        atendimento::create([
            'atendimento_id' => 'Fazer a unha',
            'diahora' => '2018-11-05 15:00:00',
            'user_id' => 3
        ]);

        atendimento::create([
            'atendimento_id' => 'Maquiagem, arrumar o cabelo',
            'diahora' => '2018-11-05 15:30:00',
            'user_id' => 4
        ]);
    }
}
