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
        Schema::create('contratos', function (Blueprint $table) {
            $table->integer('codigo_contrato')->primary(); 
            $table->unsignedBigInteger('numero_de_cliente_id');
            $table->foreign('numero_de_cliente_id')->references('numero_de_cliente')->on('clientes');
            $table->string('numero_de_línea');
            $table->date('fecha_activacion');
            $table->float('valor_plan', 8, 2);
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
