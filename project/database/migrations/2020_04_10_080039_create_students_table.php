<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id')->nullable();
            $table->string('number', 10);
            $table->string('surname', 50);
            $table->string('name', 50);
            $table->string('patronymic', 50);
            $table->enum('gender', ['м', 'ж']);
            $table->date('birthday');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
