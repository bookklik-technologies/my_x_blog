<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configs')->insert([
            [
                'id' => 1,
                'key' => 'name',
                'value' => 'My Blog',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'key' => 'header',
                'value' => 'This is my blog header',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'key' => 'subheader',
                'value' => 'This is my blog subheader',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'key' => 'description',
                'value' => 'This is my blog description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'key' => 'footer',
                'value' => 'This is my blog footer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'key' => 'author',
                'value' => 'My Name',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'key' => 'email',
                'value' => 'myname@email.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'key' => 'link_facebook',
                'value' => 'https://facebook.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'key' => 'link_twitter',
                'value' => 'https://twitter.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'key' => 'link_instagram',
                'value' => 'https://instagram.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'key' => 'link_linkedin',
                'value' => 'https://linkedin.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
