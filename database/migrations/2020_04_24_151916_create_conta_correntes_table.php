<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaCorrentesTable extends Migration
{
    public function up()
    {
        Schema::create('conta_correntes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('correntista_id')->unsigned();
            $table->string('numero_conta')->unique();
            $table->string('agencia');
            $table->decimal('saldo', 9,2);
            $table->timestamps();
            $table->foreign('correntista_id')->references('id')->on('correntistas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('conta_correntes');
    }
}
