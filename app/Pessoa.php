<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Pessoa extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = ['nome', 'data_de_nascimento', 'cpf', 'sexo', 'cidade', 'bairro', 'rua', 'numero', 'complemento'];
    protected $dates = ['data_de_nascimento'];
    protected $primaryKey = 'id';

    public function protocolo() {
        return $this->hasMany(\App\Protocolo::class);
    }
}
