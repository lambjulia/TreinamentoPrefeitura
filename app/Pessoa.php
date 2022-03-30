<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'data_de_nascimento', 'cpf', 'sexo', 'cidade', 'bairro', 'rua', 'numero', 'complemento'];
}
