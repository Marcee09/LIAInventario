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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo_inventario')->unique();
            $table->string('codigo_patrimonio')->unique();
            $table->string('detalle');
            $table->string('imagen')->nullable(); // Permitir que sea null si no se carga una imagen
            $table->string('tipo');
            $table->integer('cantidad');
            $table->date('alta');
            $table->date('baja')->nullable(); // Permitir que sea null si no se especifica la fecha de baja
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};

