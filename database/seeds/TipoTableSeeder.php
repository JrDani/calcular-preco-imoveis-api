<?php

use Illuminate\Database\Seeder;
use App\Tipo;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create(['nome' => 'Casa (compra)']);
        Tipo::create(['nome' => 'Casa (aluguel)']);
        Tipo::create(['nome' => 'Apartamento (compra)']);
        Tipo::create(['nome' => 'Apartamento (aluguel)']);
    }
}
