<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Protocolo extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = ['descricao', 'data', 'prazo', 'pessoa_id'];
    protected $dates = ['data'];
    protected $primaryKey = 'id';
    

    public function pessoa() {
        return $this->belongsTo(\App\Pessoa::class);
    }

    public function acompanhamento() {
        return $this->hasMany(\App\Acompanhamento::class);
    }
}
