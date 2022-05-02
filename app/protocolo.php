<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    protected $fillable = ['descricao', 'data', 'prazo', 'pessoa_id'];
    protected $dates = ['data'];
    protected $primaryKey = 'id';
    

    public function pessoa() {
        return $this->belongsTo(\App\Pessoa::class);
    }
}
