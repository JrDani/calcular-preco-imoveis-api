<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Vizinhanca;
use App\Http\Resources\Bairro as VizinhancaResource;

class VizinhancaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cidade=null)
    {
        return VizinhancaResource::collection(Vizinhanca::porCidade($cidade)->get());
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vizinhanca = new Vizinhanca();
        $vizinhanca->nome = $request->nome;
        $vizinhanca->cep = $request->cep;
        $vizinhanca->fk_cidade = $request->fk_cidade;
        if($vizinhanca->save()){
            return new VizinhancaResource($vizinhanca);
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
        $vizinhanca = Vizinhanca::findOrFail($id);
        $vizinhanca->fill($request->all());
        if($vizinhanca->save()){
            return new VizinhancaResource($vizinhanca);
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
        Vizinhanca::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}
