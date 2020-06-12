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
            'name'=>"Elea",
            "email"=>"Elea@viacesi.fr",
            "password" => bcrypt("chomeuse")
        ]);

        Illuminate\Support\Facades\DB::table('users')->insert([
           'name'=>"Xavier",
           "email"=>"xavier@viacesi.fr",
           "password" => bcrypt("chomeuse")
       ]);

       Illuminate\Support\Facades\DB::table('users')->insert([
           'name'=>"Pierre",
           "email"=>"pierre@viacesi.fr",
           "password" => bcrypt("chomeuse")
       ]);

       Illuminate\Support\Facades\DB::table('users')->insert([
           'name'=>"Elouan",
           "email"=>"elouan@viacesi.fr",
           "password" => bcrypt("chomeuse")
       ]);

       Illuminate\Support\Facades\DB::table('users')->insert([
           'name'=>"Matheo",
           "email"=>"matheo@viacesi.fr",
           "password" => bcrypt("chomeuse")
       ]);
    }
}
