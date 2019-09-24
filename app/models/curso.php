<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = 'curso';

    protected $fillable = [
        'name', 'duracao','status' ,'instituicao_id'  ];
}
