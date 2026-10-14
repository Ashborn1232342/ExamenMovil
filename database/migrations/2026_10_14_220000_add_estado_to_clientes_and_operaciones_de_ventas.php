<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
        });

        Schema::table('operaciones_de__ventas', function (Blueprint $table) {
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
        });
    }

    public function down(): void
    {
        Schema::table('operaciones_de__ventas', function (Blueprint $table) {
            $table->dropColumn('estado');
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};
