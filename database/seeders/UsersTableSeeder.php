<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name'=>'Abrham Ayanew',
                'username'=>'abrham',
                'email'=>'abrham@gmail.com',
                'password'=>Hash::make('111'),
                'collage'=>'',
                'department'=>'',
                'role'=>'admin',
                'status'=>'active',
            ],

            //informatics collage registral
            [
                'name'=>'Anduamlak Dilnessa',
                'username'=>'anduamlak',
                'email'=>'anduamlak@gmail.com',
                'password'=>Hash::make('111'),
                'collage'=>'informatics',
              
                'department'=>'',
                'role'=>'collage_registral',
                'status'=>'active',
            ],

             //informatics collage dean
            [
                'name'=>'Ashenafi Belay',
                'username'=>'ashenafi',
                'email'=>'ashenafi@gmail.com',
                'password'=>Hash::make('111'),
                'collage'=>'informatics',
             
                'department'=>'',
                'role'=>'collage_dean',
                'status'=>'active',
            ],

            //IT Department Head
            [
                'name'=>'Mekdes Emagnu',
                'username'=>'mekdes',
                'email'=>'mekdes@gmail.com',
                'password'=>Hash::make('111'),
                'collage'=>'informatics',
                'department'=>'IT',
                'role'=>'department_head',
                'status'=>'active',
            ],

            //users                   //admin
            [
                'name'=>'Tsehay Taso',
                'username'=>'tsehay',
                'email'=>'tsehay@gmail.com',
                'password'=>Hash::make('111'),
                'collage'=>'informatics',
                'department'=>'IT',
                'role'=>'stuff',
                'status'=>'active',
            ],
        ]);

        //
    }
}
