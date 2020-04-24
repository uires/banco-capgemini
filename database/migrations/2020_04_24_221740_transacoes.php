<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transacoes extends Migration
{
    public function up()
    {
        Schema::create('transacoes_bancarias', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('conta_corrente_id')->unsigned();
            $table->decimal('valor', 9,2);
            $table->string('tipo');
            $table->foreign('conta_corrente_id')->references('id')->on('conta_correntes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('transacoes_bancarias');
    }
}
