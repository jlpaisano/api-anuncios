<?php

use Illuminate\Database\Seeder;

class AnunciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Anuncio::class, 25)->create();
    }
}
