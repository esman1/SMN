<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * agregar factura, provedor, fecha de adquisicion, costo agregar columnas
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('id_stock');
            $table->string('Nserie', 50)->unique();
            $table->unsignedBigInteger('modelo_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('sisop_id');
            $table->unsignedBigInteger('proces_id');
            $table->unsignedBigInteger('mem_id');
            $table->unsignedBigInteger('disc_d');

            $table->foreign('modelo_id')->references('id_modelo')->on('modelos');
            $table->foreign('tipo_id')->references('id_tipo')->on('tipos');
            $table->foreign('marca_id')->references('id_marca')->on('marcas');
            $table->foreign('sisop_id')->references('id_sisop')->on('sisops');
            $table->foreign('proces_id')->references('id_proc')->on('procesadors');
            $table->foreign('mem_id')->references('id_mem')->on('memorias');
            $table->foreign('disc_d')->references('id_disc')->on('discods');
            
            $table->timestamps();
										
											
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
