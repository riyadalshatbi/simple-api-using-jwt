<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
            'id'=>1,
            'name_ar'=>'ملابس',
            'name_en'=>'clothes',
            ],
            [
            'id'=>2,
            'name_ar'=>'احذية',
            'name_en'=>'chooses',
            ]
        ];

        DB::table('categories')->insert($categories); 
    }
}
