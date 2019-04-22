<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vizinhanca extends Model
{
    protected $fillable = ['nome', 'cep', 'fk_cidade'];

    public function amostras()
    {
        return $this->hasMany('App\Amostra', 'fk_vizinhanca');
    }
    
    public function cidade()
    {
        return $this->belongsTo('App\Cidade', 'fk_cidade');
    }

    public function scopePorCidade($query, $cidade)
    {
        if($cidade){
            return $query->where('fk_cidade', '=', $cidade);
        }
        return $query;
    }
}
