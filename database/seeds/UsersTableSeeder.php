<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Luis Jesus";
        $user->email = "luis@gmail.com";
        $user->password = bcrypt("secret");
        $user->save();

        $user = new User();
        $user->name = "Jose Antonio";
        $user->email = "jose@gmail.com";
        $user->password = bcrypt("secret");
        $user->save();

        $user = new User();
        $user->name = "Fernanda Diaz";
        $user->email = "fer@gmail.com";
        $user->password = bcrypt("secret");
        $user->save();

        $user = new User();
        $user->name = "Armando Casas";
        $user->email = "armando@gmail.com";
        $user->password = bcrypt("secret");
        $user->save();

    }
}
