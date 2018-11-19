<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\atendimento;

class servico extends Model
{
    protected $table = 'servico';
    public function atendimento()
    {
        return $this->belongsTo(atendimento::class); //pertence a
    }
}