<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'ٌرياض',
            'email' => 'user@hotmail.com',
            'password' => Hash::make(123456),
            'email_verified_at' => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($users); 
    }
}
