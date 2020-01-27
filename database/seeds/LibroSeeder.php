<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Libro;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libros')->truncate();
        factory(Libro::class, 20)->create();
    }
}
