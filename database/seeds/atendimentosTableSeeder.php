<?php

use Illuminate\Database\Seeder;
use App\Atendimento;

class atendimentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Atividade::create([
            'servico_id' => 'Cortar o cabelo',
            'diahora' => '2018-11-05 13:30:00',
            'user_id' => 1
        ]);

        Atividade::create([
            'servico_id' => 'Pintar o cabelo e tirar a sobrancelha',
            'diahora' => '2018-11-05 14:00:00',
            'user_id' => 2
        ]);

        Atividade::create([
            'servico_id' => 'Fazer a unha',
            'diahora' => '2018-11-05 15:00:00',
            'user_id' => 3
        ]);

        Atividade::create([
            'servico_id' => 'Maquiagem, arrumar o cabelo',
            'diahora' => '2018-11-05 15:30:00',
            'user_id' => 4
        ]);
    }
}
