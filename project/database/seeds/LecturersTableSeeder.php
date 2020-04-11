<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('lecturers')->insert([
            [
                'surname' => 'Петров',
                'name' => 'Иван',
                'patronymic' => 'Сергеевич',
                'post_id' => 2,
                'faculty_id' => 1
            ],
            [
                'surname' => 'Сергеев',
                'name' => 'Игорь',
                'patronymic' => 'Павлович',
                'post_id' => 1,
                'faculty_id' => 4
            ],
            [
                'surname' => 'Антонова',
                'name' => 'Татьяна',
                'patronymic' => 'Сергеевна',
                'post_id' => 3,
                'faculty_id' => 2
            ],
            [
                'surname' => 'Иванов',
                'name' => 'Сергей',
                'patronymic' => 'Васильевич',
                'post_id' => 4,
                'faculty_id' => 1
            ],
            [
                'surname' => 'Климова',
                'name' => 'Ольга',
                'patronymic' => 'Владимировна',
                'post_id' => 1,
                'faculty_id' => 3
            ],
            [
                'surname' => 'Карелин',
                'name' => 'Андрей',
                'patronymic' => 'Михайлович',
                'post_id' => 2,
                'faculty_id' => 1
            ],
            [
                'surname' => 'Федоров',
                'name' => 'Виктор',
                'patronymic' => 'Федорович',
                'post_id' => 2,
                'faculty_id' => 4
            ],
            [
                'surname' => 'Степанов',
                'name' => 'Илья',
                'patronymic' => 'Иванович',
                'post_id' => 5,
                'faculty_id' => 2
            ],
            [
                'surname' => 'Тимофеев',
                'name' => 'Иван',
                'patronymic' => 'Сергеевич',
                'post_id' => 3,
                'faculty_id' => 3
            ],
            [
                'surname' => 'Симонов',
                'name' => 'Иван',
                'patronymic' => 'Сергеевич',
                'post_id' => 4,
                'faculty_id' => 4
            ],
            [
                'surname' => 'Рощина',
                'name' => 'Татьяна',
                'patronymic' => 'Сергеевна',
                'post_id' => 2,
                'faculty_id' => 4
            ],
            [
                'surname' => 'Вербицкая',
                'name' => 'Елена',
                'patronymic' => 'Петровна',
                'post_id' => 2,
                'faculty_id' => 1
            ],
            [
                'surname' => 'Решетник',
                'name' => 'Татьяна',
                'patronymic' => 'Сергеевна',
                'post_id' => 2,
                'faculty_id' => 3
            ]
        ]);
    }
}
