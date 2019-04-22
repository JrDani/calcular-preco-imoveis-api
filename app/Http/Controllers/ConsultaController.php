<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vizinhanca;
use App\Amostra;
use League\Flysystem\Exception;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pega todas as amostras do bairro
        if($nesteBairro = Amostra::porBairro(request()->input('bairro'))->get())

        if($nesteBairro->count() == 0)
            return response()->json(['message' => "404"]);
           
        //descobre quantos custa o m² deste bairro
        $valorArea = $nesteBairro->sum('valorArea') / $nesteBairro->count();
      
        return response()->json(['valor_area' => $valorArea]);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
