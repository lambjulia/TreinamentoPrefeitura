<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'data_de_nascimento', 'cpf', 'sexo', 'cidade', 'bairro', 'rua', 'numero', 'complemento'];
    protected $primaryKey = 'id';

    public function protocolo() {
        return $this->hasOne(Protocolo::class, 'pessoa_id', 'id');
    }
}
