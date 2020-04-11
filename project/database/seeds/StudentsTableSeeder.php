<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            [
                'group_id' => 1,
                'number' => '091110001',
                'surname' => 'Бачин',
                'name' => 'Иван',
                'patronymic' => 'Сергеевич',
                'gender' => 'м',
                'birthday' => '1992-03-10'
            ],
            [
                'group_id' => 1,
                'number' => '091110002',
                'surname' => 'Ляповка',
                'name' => 'Игорь',
                'patronymic' => 'Павлович',
                'gender' => 'м',
                'birthday' => '1992-12-21'
            ],
            [
                'group_id' => 1,
                'number' => '091110003',
                'surname' => 'Разумова',
                'name' => 'Татьяна',
                'patronymic' => 'Сергеевна',
                'gender' => 'ж',
                'birthday' => '1993-01-01'
            ],
            [
                'group_id' => 2,
                'number' => '091110021',
                'surname' => 'Кустов',
                'name' => 'Сергей',
                'patronymic' => 'Васильевич',
                'gender' => 'м',
                'birthday' => '1993-02-09'
            ],
            [
                'group_id' => 2,
                'number' => '091110022',
                'surname' => 'Климова',
                'name' => 'Ольга',
                'patronymic' => 'Владимировна',
                'gender' => 'ж',
                'birthday' => '1993-01-04'
            ],
            [
                'group_id' => 2,
                'number' => '091110023',
                'surname' => 'Корнеев',
                'name' => 'Андрей',
                'patronymic' => 'Михайлович',
                'gender' => 'м',
                'birthday' => '1992-08-13'
            ],
            [
                'group_id' => 2,
                'number' => '091110024',
                'surname' => 'Степанов',
                'name' => 'Илья',
                'patronymic' => 'Иванович',
                'gender' => 'м',
                'birthday' => '1992-01-23'
            ],
            [
                'group_id' => 3,
                'number' => '101110011',
                'surname' => 'Тимофеев',
                'name' => 'Иван',
                'patronymic' => 'Сергеевич',
                'gender' => 'м',
                'birthday' => '1993-06-16'
            ],
            [
                'group_id' => 3,
                'number' => '101110012',
                'surname' => 'Тропинин',
                'name' => 'Эдуард',
                'patronymic' => 'Алелксандрович',
                'gender' => 'м',
                'birthday' => '1992-11-25'
            ],
            [
                'group_id' => 4,
                'number' => '101110021',
                'surname' => 'Рязанова',
                'name' => 'Светлана',
                'patronymic' => 'Олеговна',
                'gender' => 'ж',
                'birthday' => '1993-04-28'
            ],
            [
                'group_id' => 4,
                'number' => '101110025',
                'surname' => 'Верба',
                'name' => 'Елена',
                'patronymic' => 'Петровна',
                'gender' => 'ж',
                'birthday' => '1992-09-18'
            ],
            [
                'group_id' => 5,
                'number' => '102110010',
                'surname' => 'Симаков',
                'name' => 'Федор',
                'patronymic' => 'Иванович',
                'gender' => 'м',
                'birthday' => '1993-01-20'
            ],
            [
                'group_id' => 5,
                'number' => '102110001',
                'surname' => 'Углов',
                'name' => 'Никита',
                'patronymic' => 'Алексеевич',
                'gender' => 'м',
                'birthday' => '1993-01-09'
            ],
            [
                'group_id' => 6,
                'number' => '102110029',
                'surname' => 'Сибиряков',
                'name' => 'Андрей',
                'patronymic' => 'Денисович',
                'gender' => 'м',
                'birthday' => '1993-04-12'
            ],
            [
                'group_id' => 6,
                'number' => '102110027',
                'surname' => 'Марченко',
                'name' => 'Валентина',
                'patronymic' => 'Михайловна',
                'gender' => 'ж',
                'birthday' => '1993-05-06'
            ],
            [
                'group_id' => 6,
                'number' => '102110030',
                'surname' => 'Петренко',
                'name' => 'Олег',
                'patronymic' => 'Федорович',
                'gender' => 'м',
                'birthday' => '1993-06-05'
            ]
        ]);
    }
}
