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
            'first_name'=>"Elea",
            'name' =>"La Chomeuse",
            'email'=>"Elea@viacesi.fr",
            'password' => bcrypt("123456789"),
            'status' =>(2)
        ]);

        Illuminate\Support\Facades\DB::table('users')->insert([
           'first_name'=>"Xavier",
           'name' =>"Labarbe",
           "email"=>"xavier@viacesi.fr",
           "password" => bcrypt("123456789"),
            'status' =>(1)
       ]);

       Illuminate\Support\Facades\DB::table('users')->insert([
           'first_name'=>"Pierre",
           'name' =>"Forques",
           "email"=>"pierre@viacesi.fr",
           "password" => bcrypt("123456789"),
           'status' =>(1)
       ]);

       Illuminate\Support\Facades\DB::table('users')->insert([
           'first_name'=>"Elouan",
           'name' =>"Jeannot",
           "email"=>"elouan@viacesi.fr",
           "password" => bcrypt("123456789"),
           'status' =>(1)
       ]);

       Illuminate\Support\Facades\DB::table('users')->insert([
           'first_name'=>"Matheo",
           'name' =>"Berger",
           "email"=>"matheo@viacesi.fr",
           "password" => bcrypt("123456789"),
           'status' =>(1)
       ]);
    }
}
