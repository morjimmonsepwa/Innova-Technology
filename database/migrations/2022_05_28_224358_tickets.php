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
            $table->integer('affair');
            $table->string('reason');
            $table->string('client');
            $table->integer('via');
            $table->bigInteger('id_business')->unsigned()->nullable();
            $table->string('product');
            $table->bigInteger('id_generate')->unsigned()->nullable();
            $table->bigInteger('id_manager')->unsigned()->nullable();
            $table->bigInteger('id_assigned')->unsigned()->nullable();
            $table->integer('status');
            $table->timestamps();


            $table->foreign('id_business')->references('id')->on('companies')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');


            $table->foreign('id_generate')->references('id')->on('users')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->foreign('id_manager')->references('id')->on('users')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->foreign('id_assigned')->references('id')->on('users')
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
