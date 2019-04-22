<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Cidade;
use App\Http\Resources\Cidade as CidadeResource;
use App\Estado;

class CidadeController extends Controller
{
    public function index($estado=null)
    {              
        //$cidades = Cidade::paginate(1);        
        return CidadeResource::collection(Cidade::PorEstado($estado)->get());
    }

    public function create()
    {
        //nop
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade();
        $cidade->fk_estado = $request->fk_estado;        
        $cidade->nome = $request->nome;

        if($cidade->save()){
            return new CidadeResource($cidade);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cidade = Cidade::findOrFail($id);
        return new CidadeResource($cidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //nop
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cidade = Cidade::findOrFail($id);
        $cidade->fill($request->all());      
        if($cidade->save()){
            return new CidadeResource($cidade);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cidade::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}
