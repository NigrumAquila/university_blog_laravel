<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamMarksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('exam_marks')->insert([
            [
                'subject_id' => 1,
                'student_id' => 1,
                'mark_id' => 4,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 1,
                'student_id' => 2,
                'mark_id' => 5,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 1,
                'student_id' => 3,
                'mark_id' => 4,
                'date' => '2019-11-02'
            ],
            [
                'subject_id' => 2,
                'student_id' => 1,
                'mark_id' => 5,
                'date' => '2019-11-06'
            ],
            [
                'subject_id' => 2,
                'student_id' => 2,
                'mark_id' => 4,
                'date' => '2019-11-13'
            ],
            [
                'subject_id' => 2,
                'student_id' => 3,
                'mark_id' => 4,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 3,
                'student_id' => 1,
                'mark_id' => 1,
                'date' => '2019-11-02'
            ],
            [
                'subject_id' => 3,
                'student_id' => 2,
                'mark_id' => 1,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 3,
                'student_id' => 3,
                'mark_id' => 1,
                'date' => '2019-11-02'
            ],
            [
                'subject_id' => 4,
                'student_id' => 1,
                'mark_id' => 5,
                'date' => '2019-11-06'
            ],
            [
                'subject_id' => 4,
                'student_id' => 2,
                'mark_id' => 5,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 4,
                'student_id' => 3,
                'mark_id' => 5,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 5,
                'student_id' => 1,
                'mark_id' => 0,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 5,
                'student_id' => 2,
                'mark_id' => 1,
                'date' => '2019-11-07'
            ],
            [
                'subject_id' => 5,
                'student_id' => 3,
                'mark_id' => 0,
                'date' => '2019-11-06'
            ],
            [
                'subject_id' => 6,
                'student_id' => 4,
                'mark_id' => 4,
                'date' => '2019-11-20'
            ],
            [
                'subject_id' => 6,
                'student_id' => 5,
                'mark_id' => 5,
                'date' => '2019-11-02'
            ],
            [
                'subject_id' => 6,
                'student_id' => 6,
                'mark_id' => 2,
                'date' => '2019-11-07'
            ],
            [
                'subject_id' => 6,
                'student_id' => 7,
                'mark_id' => 5,
                'date' => '2019-11-02'
            ],
            [
                'subject_id' => 7,
                'student_id' => 4,
                'mark_id' => 5,
                'date' => '2019-11-04'
            ],
            [
                'subject_id' => 7,
                'student_id' => 5,
                'mark_id' => 2,
                'date' => '2019-11-11'
            ],
            [
                'subject_id' => 7,
                'student_id' => 6,
                'mark_id' => 5,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 7,
                'student_id' => 7,
                'mark_id' => 3,
                'date' => '2019-11-03'
            ],
            [
                'subject_id' => 8,
                'student_id' => 4,
                'mark_id' => 1,
                'date' => '2019-11-01'
            ],
            [
                'subject_id' => 8,
                'student_id' => 5,
                'mark_id' => 1,
                'date' => '2019-11-05'
            ]
        ]);
    }
}
