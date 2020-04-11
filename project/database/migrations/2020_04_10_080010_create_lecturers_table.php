<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname', 50);
            $table->string('name', 50);
            $table->string('patronymic', 50);
            $table->unsignedInteger('post_id')->nullable();
            $table->unsignedInteger('faculty_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
