<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class protocolo extends Model
{
    protected $fillable = ['descricao', 'data', 'prazo', 'pessoa_id'];
    protected $primaryKey = 'id';
    

    public function pessoa() {
        return $this->belongsTo(Pessoa::class, 'id',  'pessoa_id');
    }
}
