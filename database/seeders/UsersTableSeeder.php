<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'username' =>'admin',
            'password' =>Hash::make('admin'),
            'name' =>'Admin',
            'email' =>'admin@gmail.com',
            'role' =>'admin',
            'status' =>'active',
        ]);
        DB::table('users')->insert([
            'username' =>'vendor',
            'password' =>Hash::make('vendor'),
            'name' =>'Vendor',
            'email' =>'vendor@gmail.com',
            'role' =>'vendor',
            'status' =>'active',
        ]);
        DB::table('users')->insert([
            'username' =>'user',
            'password' =>Hash::make('user'),
            'name' =>'User',
            'email' =>'user@gmail.com',
            'role' =>'vendor',
            'status' =>'active',
        ]);

    }
}
