<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acompanhamento extends Model
{
    protected $fillable = ['data', 'descricao', 'user_id', 'protocolo_id'];

    public function protocolo() {
        return $this->belongsTo(\App\Protocolo::class);
    }
}
