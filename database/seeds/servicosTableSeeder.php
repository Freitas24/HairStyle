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
            'descricao' => 'Cortar cabelo',
            'valor' => 60.00,
            'tempomedio' => '1:00:00'
        ]);

        servico::create([
            'descricao' => 'Pintar o cabelo',
            'valor' => 45.00,
            'tempomedio' => '1:00:00'
        ]);

        servico::create([
            'descricao' => 'Fazer as unhas',
            'valor' => 30.00,
            'tempomedio' => '00:30:00'
        ]);

        servico::create([
            'descricao' => 'Maquiagem',
            'valor' => 100.00,
            'tempomedio' => '1:00:00'
        ]);
        servico::create([
            'descricao' => 'Tirar a sobrancelha',
            'valor' => 20.00,
            'tempomedio' => '1:00:00'
        ]);
    }
}
