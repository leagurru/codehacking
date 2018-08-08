<?php

use App\User;
use Illuminate\Database\Seeder;

class usersseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'Prueba',
                'email'=>'prueba@gmail.com'
            ]);
    }
}
