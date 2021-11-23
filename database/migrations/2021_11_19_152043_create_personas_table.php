<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table -> string ('nombre',100)->nullable();
            $table -> string ('apellido',100)->nullable();
            $table -> string ('cedula')->nullable();
            $table -> string ('correo',100)->nullable();
            $table -> string ('telefono')->nullable();
            $table -> text ('direccion',100)->nullable();
            $table -> string ('sexo')->nullable();
            $table -> text ('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger ('persona_id')->references('id')->no('personas');
            $table -> string ('telefono',10);
            $table -> char('tipo_telefono', 1);;
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
        Schema::dropIfExists('personas');
    }
}
