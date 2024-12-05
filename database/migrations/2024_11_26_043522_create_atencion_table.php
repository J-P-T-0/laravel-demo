<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionTable extends Migration
{
    /**
     * Ejecuta la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencion', function (Blueprint $table) {
            $table->id();  // Crea la columna "id" como clave primaria autoincrementable
            $table->integer('atencion');  // Crea la columna "atencion" de tipo int
            $table->integer('calidad');   // Crea la columna "calidad" de tipo int
            $table->integer('recomendacion');  // Crea la columna "recomendacion" de tipo int
            $table->integer('experiencia');    // Crea la columna "experiencia" de tipo int
            $table->integer('facilidad');      // Crea la columna "facilidad" de tipo int
            $table->string('comentarios', 200)->nullable();  // Crea la columna "comentarios" de tipo varchar con longitud máxima de 200 caracteres
            $table->timestamps();  // Crea las columnas "created_at" y "updated_at" para llevar el registro de tiempos
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atencion');
    }
}
