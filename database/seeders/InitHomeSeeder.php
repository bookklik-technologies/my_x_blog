<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home')->insert([
            [
                'key' => 'name',
                'value' => 'My Blog',
            ],
            [
                'key' => 'header',
                'value' => 'This is my blog header',
            ],
            [
                'key' => 'subheader',
                'value' => 'This is my blog subheader',
            ],
            [
                'key' => 'description',
                'value' => 'This is my blog description',
            ],
            [
                'key' => 'footer',
                'value' => 'This is my blog footer',
            ],
            [
                'key' => 'author',
                'value' => 'My Blog',
            ],
            [
                'key' => 'email',
                'value' => 'myname@email.com',
            ],
            [
                'key' => 'link_facebook',
                'value' => 'https://facebook.com',
            ],
            [
                'key' => 'link_twitter',
                'value' => 'https://twitter.com',
            ],
            [
                'key' => 'link_instagram',
                'value' => 'https://instagram.com',
            ],
            [
                'key' => 'link_linkedin',
                'value' => 'https://linkedin.com',
            ]
        ]);
    }
}
