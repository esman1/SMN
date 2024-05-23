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
            $table->unsignedBigInteger('modelo_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('tipo_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('marca_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('sisop_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('proces_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('mem_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('disc_d')->nullable()->onDelete('set null');
            $table->string('Estatus', 12);
            $table->string('estatusv', 50);

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
