<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Imovel extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "area" => $this->area,
            "preco" => $this->preco,
            "fk_vizinhanca" => $this->fk_vizinhanca,
            "regiao" => $this->vizinhanca->nome."/".$this->vizinhanca->cidade->nome,
            "quartos" => $this->quantidade_quartos,
            "fk_tipo" => $this->fk_tipo,
            "tipo" => $this->tipo->nome
        ];
    }
}
