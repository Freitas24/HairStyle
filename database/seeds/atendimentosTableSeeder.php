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
            'diahora_inicio' => '2018-11-05 13:30:00',
            'diahora_final' => '2018-11-05 14:00:00',
            'user_id' => 1,
            'servico_id' => 1,
        ]);

        atendimento::create([
            'diahora_inicio' => '2018-11-06 14:00:00',
            'diahora_final' => '2018-11-06 14:30:00',
            'user_id' => 1,
            'servico_id' => 2,
        ]);

        atendimento::create([
            'diahora_inicio' => '2018-11-07 15:00:00',
            'diahora_final' => '2018-11-07 16:00:00',
            'user_id' => 1,
            'servico_id' => 3,
        ]);

        atendimento::create([
            'diahora_inicio' => '2018-11-08 15:30:00',
            'diahora_final' => '2018-11-08 16:30:00',
            'user_id' => 1,
            'servico_id' => 2,
        ]);
    }
}
