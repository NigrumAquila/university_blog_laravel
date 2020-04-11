<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamMarksTable extends Migration
{
    public function up()
    {
        Schema::create('exam_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subject_id')->nullable();
            $table->unsignedInteger('student_id')->nullable();
            $table->unsignedInteger('mark_id')->nullable();
            $table->date('date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_marks');
    }
}
