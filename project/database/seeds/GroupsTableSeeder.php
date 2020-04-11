<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->insert([
            ['name' => 'ИС-09-01'],
            ['name' => 'ИС-09-02'],
            ['name' => 'ИС-10-01'],
            ['name' => 'ИС-10-02'],
            ['name' => 'ПО-10-01'],
            ['name' => 'ПО-10-02']
        ]);
    }
}
