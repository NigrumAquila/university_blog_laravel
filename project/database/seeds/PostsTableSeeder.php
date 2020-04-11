<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            ['name' => 'ассистент'],
            ['name' => 'доцент'],
            ['name' => 'преподаватель'],
            ['name' => 'профессор'],
            ['name' => 'старший преподаватель'],
            ['name' => 'заведующий кафедрой']
        ]);
    }
}
