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
        Schema::create('asigsucs', function (Blueprint $table) {
            $table->id('id_asigsuc');
            $table->string('nFol', 20)->unique();
            $table->unsignedBigInteger('suc_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('area_id')->nullable()->onDelete('set null');
            $table->unsignedBigInteger('stock_id')->nullable()->onDelete('set null');
            $table->string('nAct',15)->nullable();
            $table->foreign('suc_id')->references('id_sucursal')->on('sucursals')->onDelete('set null');
            $table->foreign('area_id')->references('id_area')->on('areas')->onDelete('set null');
            $table->foreign('stock_id')->references('id_stock')->on('stocks')->onDelete('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asigsucs');
    }
};
