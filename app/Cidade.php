<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['nome', 'fk_estado'];
    
    public function estado()
    {
        return $this->belongsTo('App\Estado', 'fk_estado');        
    }

    public function scopePorEstado($query, $estado)
    {
        if ($estado) {
           return $query->where('fk_estado', '=', $estado);
        }
        return $query;
    }
   
    public function vizinhancas()
    {
        return $this->hasMany('App\Vizinhancas', 'fk_cidade');
    }
   
}
