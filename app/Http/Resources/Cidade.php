<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Cidade extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            "fk_estado" => $this->fk_estado,
            "estado" => $this->estado->nome
        ];
    }
}
