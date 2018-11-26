<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\servico;
use App\User;

class atendimento extends Model
{
    protected $table = 'atendimentos';
    
    public function servico()
    {
        return $this->belongsTo(servico::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}