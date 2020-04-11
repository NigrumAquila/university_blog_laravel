<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password')->nullable();
            $table->enum('rights', ['admin', 'manager', 'none']);
            $table->boolean('is_admin');
            $table->boolean('is_moder');
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
