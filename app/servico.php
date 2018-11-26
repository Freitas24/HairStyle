<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\atendimento;

class servico extends Model
{
    protected $table = 'servicos';
    

    public function atendimentos()
    {
        return $this->hasMany(atendimento::class); 
    }
}