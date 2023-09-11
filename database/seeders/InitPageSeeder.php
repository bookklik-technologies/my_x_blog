<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'id' => 1,
                'title' => 'Page 1',
                'slug' => 'page-1',
                'description' => 'This is page 1',
                'keywords' => 'This is page 1',
                'content' => 'This is page 1',
                'category_id' => 4,
                'author_id' => 1,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Page 2',
                'slug' => 'page-2',
                'description' => 'This is page 2',
                'keywords' => 'This is page 2',
                'content' => 'This is page 2',
                'category_id' => 5,
                'author_id' => 1,
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
