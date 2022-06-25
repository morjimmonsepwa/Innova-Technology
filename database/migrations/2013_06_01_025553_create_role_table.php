<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Http\Controllers\Permisos;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('permissions');
            $table->timestamps();
        });

        $new = new Role();
        $new->name = 'Sin Rol';
        $new->permissions = '';
        $new->save();

        $new = new Role();
        $new->name = 'Administrador';
        $new->permissions = Permisos::get();
        $new->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
