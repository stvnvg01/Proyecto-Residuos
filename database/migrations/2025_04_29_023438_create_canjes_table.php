<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('canjes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // Cambiar de unsignedInteger a integer
            $table->unsignedInteger('recompensa_id');
            $table->integer('puntos_usados');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('recompensa_id')->references('id')->on('recompensas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('canjes');
    }
};