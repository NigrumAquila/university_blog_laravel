<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultiesTable extends Migration
{
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abbreviation', 10);
            $table->string('name', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
