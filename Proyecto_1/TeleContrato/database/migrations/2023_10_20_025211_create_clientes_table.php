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
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('tipo_de_identificacion', 50);
            $table->integer('numero_de_cliente', 11);
            $table->string('nombre', 100);
            $table->string('telefono', 100);
            $table->string('ciudad', 100);
            $table->string('correo', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
