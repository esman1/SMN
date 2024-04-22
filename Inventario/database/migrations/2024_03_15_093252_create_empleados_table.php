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
            $table->string('apellidoP', 55)->nullable();
            $table->string('apellidoM', 55)->nullable();
      
            $table->string('email', 55)->nullable()->nullable();
         
            $table->string('celular', 55)->nullable()->nullable();
            $table->string('foto_emple', 255)->nullable();
            $table->unsignedBigInteger('puesto_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('departamento_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('sucursal_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('estatus_id')->nullable()->onDelete('set null');
            $table->datetime('fecha_contrat')->nullable();
            $table->datetime('fecha_alta')->nullable();
            $table->datetime('fecha_baja')->nullable();

            
            $table->foreign('puesto_id')->references('id_puesto')->on('puestos');
            $table->foreign('departamento_id')->references('id_depart')->on('departamentos');
            $table->foreign('sucursal_id')->references('id_sucursal')->on('sucursals');
            $table->foreign('estatus_id')->references('id_estat')->on('estatuses');

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
