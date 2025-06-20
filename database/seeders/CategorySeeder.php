<?php

namespace Database\Seeders;

use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        \App\Models\Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
        ]);

        \App\Models\Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);

    }
}
