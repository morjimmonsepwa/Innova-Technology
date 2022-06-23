<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('asunto');
            $table->string('motivo');
            $table->string('cliente');
            $table->integer('via');
            $table->bigInteger('id_empresa')->unsigned()->nullable();
            $table->string('producto');
            $table->bigInteger('id_encargado')->unsigned()->nullable();
            $table->bigInteger('id_asignado')->unsigned()->nullable();
            $table->integer('status');
            $table->timestamps();


            $table->foreign('id_empresa')->references('id')->on('companies')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->foreign('id_encargado')->references('id')->on('users')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->foreign('id_asignado')->references('id')->on('users')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
