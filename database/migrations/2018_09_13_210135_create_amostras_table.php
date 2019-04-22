<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmostrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });

        Schema::create('amostras', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('area', 8, 2);            
            $table->integer('quantidade_quartos');
            $table->decimal('preco', 10,2);
            $table->integer('fk_vizinhanca')->unsigned();
            $table->integer('fk_tipo')->default(1)->unsigned();
            $table->timestamps();
        });

        Schema::table('amostras', function(Blueprint $table){
            $table->foreign('fk_vizinhanca')->references('id')->on('vizinhancas');
            $table->foreign('fk_tipo')->references('id')->on('tipos');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
        Schema::dropIfExists('amostras');        
    }
}
