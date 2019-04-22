<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Bairro as BairroResource;
use App\Vizinhanca;

class BairroController extends Controller
{
    public function index()
    {
        $bairros = Vizinhanca::all();
        
        return BairroResource::collection($bairros);
    }

    public function show($id)
    {
        $bairro = Bairro::findOrFail($id);

        return new BairroResource($bairro);
    }

    public function new(Request $request)
    {
        $bairro = Vizinhanca::create($request->all());

        return new BairroResource($bairro);
    }

    public function update(Request $request)
    {
        $bairro = Vizinhanca::findOrFail($request->id);
        $params = $request->except('id');
        $bairro->fill($params);
        
        if($bairro->save()){
            return new BairroResource($bairro);
        }        
    }

    public function delete($id)
    {
        $bairro = Vizinhanca::findOrFail($id);
        
        if($bairro->delete()){
            return new BairroResource($bairro);
        }
    }
    
}
