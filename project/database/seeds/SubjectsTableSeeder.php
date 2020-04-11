<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->insert([
            ['name' => 'математика', 'hour' => 56],
            ['name' => 'информатика', 'hour' => 94],
            ['name' => 'физика', 'hour' => 120],
            ['name' => 'история', 'hour' => 72],
            ['name' => 'ЭВМ', 'hour' => 36],
            ['name' => 'английский', 'hour' => 82],
            ['name' => 'базы данных','hour' => 110],
            ['name' => 'компьютерные сети', 'hour' => 96]
        ]);
    }
}
