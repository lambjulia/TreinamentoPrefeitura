<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class protocolo extends Model
{
    protected $fillable = ['contribuinte', 'descricao', 'data', 'prazo'];
    protected $primaryKey = 'numeroprot';
}
