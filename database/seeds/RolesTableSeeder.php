<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'autor'
        ]);
        DB::table('roles')->insert([
            'name' => 'suscriptor'
        ]);
        DB::table('roles')->insert([
            'name' => 'administrador'
        ]);

    }
}
