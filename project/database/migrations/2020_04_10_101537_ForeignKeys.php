<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('exam_marks', function($table)
        {
            $table->foreign('subject_id')->references('subject_id')->on('group_subjects')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('mark_id')->references('id')->on('marks')->onDelete('SET NULL')->onUpdate('CASCADE');
        });

        Schema::table('group_subjects', function($table)
        {
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('SET NULL')->onUpdate('CASCADE');
        });

        Schema::table('lecturers', function($table)
        {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('SET NULL')->onUpdate('CASCADE');
        });

        Schema::table('students', function($table)
        {
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    public function down()
    {
        Schema::table('exam_marks', function($table)
        {
            $table->dropForeign('exam_marks_subject_id_foreign');
            $table->dropForeign('exam_marks_student_id_foreign');
            $table->dropForeign('exam_marks_mark_id_foreign');
        });

        Schema::table('group_subjects', function($table)
        {
            $table->dropForeign('group_subjects_group_id_foreign');
            $table->dropForeign('group_subjects_subject_id_foreign');
            $table->dropForeign('group_subjects_lecturer_id_foreign');
        });

        Schema::table('lecturers', function($table)
        {
            $table->dropForeign('lecturers_post_id_foreign');
            $table->dropForeign('lecturers_faculty_id_foreign');
        });

        Schema::table('students', function($table)
        {
            $table->dropForeign('students_group_id_foreign');
        });
    }
}
