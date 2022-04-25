<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{ 
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('descripcion');

            $table->string('imagen');

            $table->unsignedBigInteger('grado_id');
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');

            $table->unsignedBigInteger('maestro_id');
            $table->foreign('maestro_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}