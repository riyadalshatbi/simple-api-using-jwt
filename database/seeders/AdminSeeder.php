<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
            'name' => 'ٌRiyad',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456),
            'verified_at' => Carbon::now(),
            ],
        ];

        DB::table('admins')->insert($admins); 
    }
}
