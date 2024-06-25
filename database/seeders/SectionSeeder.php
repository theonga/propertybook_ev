<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            [
                'name' => 'Footer',
                'title' => 'We love to make perfect solutions for your business',
                'content' => 'Aliquam malesuada non lacus ac lobortis. Sed placerat lacus et risus gravida efficitur. Curabitur semper sodales magna, et euismod mi pulvinar sed. Proin rhoncus pretium lacinia.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hero',
                'title' => 'Corporate Website',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vel libero ut tempus. Praesent mollis condimentum porttitor. Proin dignissim ac libero vel luctus.',
                'image' => 'images/hero.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Story',
                'title' => 'Our team comes with the experience and knowledge',
                'content' => null,
                'image' => 'images/story.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Services',
                'title' => 'Services',
                'content' => null,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}