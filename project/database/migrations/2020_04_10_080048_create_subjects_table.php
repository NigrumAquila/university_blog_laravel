<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('hour')->length(11);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
