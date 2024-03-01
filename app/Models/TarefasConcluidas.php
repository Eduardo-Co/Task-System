<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefasConcluidas extends Model
{
    protected $fillable = ['mensagem', 'finalizar'];
    protected $dates = ['prazo'];

    use HasFactory;
}
