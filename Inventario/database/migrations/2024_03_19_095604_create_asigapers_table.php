<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * generacion de folios automaticos 
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asigapers', function (Blueprint $table) {
            $table->id('id_asigaper');
            $table->unsignedBigInteger('empleado_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('stock_id')->nullable()->onDelete('set null'); 
            $table->string('Nactivo',50)->unique();
            $table->string('estatusv',50);
           
            $table->timestamps();
            $table->foreign('empleado_id')->references('id_empleado')->on('empleados');
            $table->foreign('stock_id')->references('id_stock')->on('stocks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asigapers');
    }
};
