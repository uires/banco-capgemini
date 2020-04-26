<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrentistasTable extends Migration
{
    public function up()
    {
        Schema::create('correntistas', function (Blueprint $table) {
        $table->increments('id');
          $table->string('nome');
          $table->string('username');
          $table->string('password');
          $table->string('email');
          $table->boolean('active');
          $table->rememberToken();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('correntistas');
    }
}
