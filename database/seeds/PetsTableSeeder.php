<?php

use Illuminate\Database\Seeder;
use App\Pet;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pet = new Pet();
        $pet->name = "Mascota 1";
        $pet->client_id = 1;
        $pet->save();
    }
}
