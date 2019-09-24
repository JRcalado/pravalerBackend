<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    protected $table = 'aluno';

    protected $fillable = [
        'name',
        'cpf',
        'nascimento',
        'email',
        'celular',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'status',
        'curso_id',
        'instituicao_id'
     ];
}
