<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('faculties')->insert([
            ['abbreviation' => 'И', 'name' => 'Информатика'],
            ['abbreviation' => 'ИС', 'name' => 'Информационные системы'],
            ['abbreviation' => 'УЭР', 'name' => 'Управление эксплуатационной работой'],
            ['abbreviation' => 'ТиПМ', 'name' => 'Теоретическая и прикладная механика']
        ]);
    }
}
