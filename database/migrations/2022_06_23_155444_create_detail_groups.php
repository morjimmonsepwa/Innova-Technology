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
        Schema::create('detail_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_group')->unsigned()->nullable();
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_group')->references('id')->on('work_groups')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->foreign('id_user')->references('id')->on('users')
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
        Schema::dropIfExists('detail_groups');
    }
};
