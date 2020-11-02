<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = "Cliente api";
        $client->email = "cliente@gmail.com";
        $client->password = bcrypt("secret");
        $client->save();
    }
}
