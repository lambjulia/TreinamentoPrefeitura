<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['departamento'];
    protected $primaryKey = 'id';

    public function protocolo() {
        return $this->hasMany(\App\Protocolo::class);
    }

    public function user() {
        return $this->belongsToMany(\App\User::class);
    }
}
