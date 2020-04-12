<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('group_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id')->nullable();
            $table->unsignedInteger('subject_id')->nullable()->index();
            $table->unsignedInteger('lecturer_id')->nullable();
            $table->enum('exam_test', ['экзамен', 'зачет']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('group_subjects');
    }
}
