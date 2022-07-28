<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('fecha_p');
            $table->string('fecha_f');
            $table->text('diagnostico_i');
            $table->text('diagnostico_p')->nullable();            
            $table->text('diagnostico_f')->nullable();            
            $table->set('estado', ['pendiente', 'proceso', 'terminado']);
            //claves foraneas
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('clientes_id');

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('clientes_id')->references('id')->on('clientes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
