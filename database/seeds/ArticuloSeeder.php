<?php

use Illuminate\Database\Seeder;
use App\Articulo;
class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->truncate();
        factory(Articulo::class,10)->create();
    }
}
