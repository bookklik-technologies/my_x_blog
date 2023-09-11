<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create seed for 5 categories example
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Category 1',
                'slug' => 'category-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Category 2',
                'slug' => 'category-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Category 3',
                'slug' => 'category-3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Category 4',
                'slug' => 'category-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Category 5',
                'slug' => 'category-5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
