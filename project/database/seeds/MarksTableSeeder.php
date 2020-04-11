<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('marks')->insert([
            // ['id' => 0, 'name' => 'не зачтено'],
            ['name' => 'не зачтено', 'value' => 0],
            ['name' => 'зачтено', 'value' => 1],
            ['name' => 'неудовлетворительно', 'value' => 2],
            ['name' => 'удовлетворительно', 'value' => 3],
            ['name' => 'хорошо', 'value' => 4],
            ['name' => 'отлично', 'value' => 5]
        ]);
    }
}
