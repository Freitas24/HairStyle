<?php

use Illuminate\Database\Seeder;
use App\servico;

class servicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        servico::create([
            'descricao' => 'Tirar as pontas e cortar em V',
            'valor' => 60.00,
            'tempomedio' => '00:30:00'
        ]);

        servico::create([
            'descricao' => 'Pintar o cebelo em castanho escuro e tirar a sobrancelha',
            'valor' => 85.00,
            'tempomedio' => '1:00:00'
        ]);

        servico::create([
            'descricao' => 'Lixar as unhas, colocar unhas postiças e design',
            'valor' => 30.00,
            'tempomedio' => '00:30:00'
        ]);

        servico::create([
            'descricao' => 'Maquiagem, arrumar o cabelo',
            'valor' => 100.00,
            'tempomedio' => '1:00:00'
        ]);
    }
}
