<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->integer('Clave_empleado')->unique();
            $table->string('nombre', 55);
            $table->string('apellidoP', 55);
            $table->string('apellidoM', 55);
      
            $table->string('email', 55);
         
            $table->string('celular', 55);
            $table->string('foto_emple', 255);
            $table->unsignedBigInteger('puesto_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('sucursal_id');
            $table->string('estatus', 55);
            $table->date('fecha_contrat')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();

            
            $table->foreign('puesto_id')->references('id_puesto')->on('puestos');
            $table->foreign('departamento_id')->references('id_depart')->on('departamentos');
            $table->foreign('sucursal_id')->references('id_sucursal')->on('sucursals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
