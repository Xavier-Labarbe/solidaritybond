<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => "El Khalfi",
            'first_name' => "Zeineb",
            'adress' => "CESI Bordeaux",
            'email' => "zelkhalfi@cesi.fr",
            'phone' => "0600000000",
            'status' => "1",
            'password' => bcrypt('zeineb')]);

        Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => "Teillier",
            'first_name' => "Elea",
            'adress' => "Fablab CESI",
            'email' => "eteillier@cesi.fr",
            'phone' => "0700000000",
            'status' => "2",
            'password' => bcrypt('elea')]);
    }
}
