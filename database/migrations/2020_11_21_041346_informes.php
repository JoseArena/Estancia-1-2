<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Informes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('edad');
            $table->string('sexo');
            $table->string('ocupacion');
            $table->string('carrera');
            $table->string('cuatrimestre');
            $table->string('sesion');
            $table->string('motivo');
            $table->string('tecnicas');
            $table->string('observaciones');
            $table->string('conclusiones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
