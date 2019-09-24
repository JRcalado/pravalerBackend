<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instituicao extends Model
{
    protected $table = 'instituicao';

    protected $fillable = [
        'name', 'cnpj','status'    ];
}
