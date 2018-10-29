<?php

use Illuminate\Database\Seeder;
use App\Servico;

class servicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Atividade::create([
            'descricao' => 'Tirar as pontas e cortar em V',
            'valor' => 'R$60,00',
            'tempomedio' => '30 minutos'
            'user_id' => 1
        ]);

        Atividade::create([
            'servico_id' => 'Pintar o cebelo em castanho escuro e tirar a sobrancelha',
            'valor' => 'R$85,00',
            'tempomedio' => '1 hora'
            'user_id' => 2
        ]);

        Atividade::create([
            'servico_id' => 'Lixar as unhas, colocar unhas postiças e design',
            'valor' => 'R$30,00',
            'tempomedio' => '30 minutos'
            'user_id' => 3
        ]);

        Atividade::create([
            'servico_id' => 'Maquiagem, arrumar o cabelo',
            'valor' => 'R$100,00',
            'tempomedio' => '1 hora'
            'user_id' => 4
        ]);
    }
}
