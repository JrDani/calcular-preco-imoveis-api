<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amostra extends Model
{
    protected $fillable = ['area', 'quantidade_quartos', 'preco', 'fk_vizinhanca', 'fk_tipo'];
   
    protected $appends = ['valorArea'];

    public function getValorAreaAttribute()
    {
        return $this->preco / $this->area;
    }    
  
    public function vizinhanca()
    {
        return $this->belongsTo('App\Vizinhanca', 'fk_vizinhanca');
    }
    public function tipo()
    {
        return $this->belongsTo('App\Tipo', 'fk_tipo');
    }

    public function scopePorBairro($query, $bairro)
    {
        return $query->where('fk_vizinhanca', '=', $bairro);
    }
}
