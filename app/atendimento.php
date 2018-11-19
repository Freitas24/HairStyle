<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\servico;

class atendimento extends Model
{
    protected $table = 'atendimentos';
    public function servico()
    {
        return $this->hasMany(servico::class); //tem muitas
    }
}