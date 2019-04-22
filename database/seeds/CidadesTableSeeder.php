<?php

use Illuminate\Database\Seeder;
use App\Cidade;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create(['nome'=>'Londrina', 'fk_estado'=>1]);
        Cidade::create(['nome'=>'Cambé', 'fk_estado'=>1]);
        Cidade::create(['nome'=>'Ibiporã', 'fk_estado'=>1]);
    }
}
