<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments("id");
            $table->bigInteger("idUsuario")->unsigned();
            $table->string("titulo");
            $table->text('descripcion');
            $table->enum("estado",["Pendiente", "Aceptado", "Rechazado","Cerrado"]);
            $table->timestamps();
        });

        Schema::table('incidencias', function($table) {
          $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
