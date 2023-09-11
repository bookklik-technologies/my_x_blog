<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post')->insert([
            [
                'id' => 1,
                'title' => 'Post 1',
                'slug' => 'post-1',
                'description' => 'This is post 1',
                'keywords' => 'This is post 1',
                'body' => 'This is post 1',
                'category_id' => 1,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Post 2',
                'slug' => 'post-2',
                'description' => 'This is post 2',
                'keywords' => 'This is post 2',
                'body' => 'This is post 2',
                'category_id' => 2,
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
