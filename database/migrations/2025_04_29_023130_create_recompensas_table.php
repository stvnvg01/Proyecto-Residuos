<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recompensas', function (Blueprint $table) {
            $table->increments('id'); // Cambiar de $table->id() a $table->increments('id')
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->integer('puntos_requeridos');
            $table->timestamps();
        });

        // Insertar algunas recompensas de ejemplo
        DB::table('recompensas')->insert([
            ['nombre' => 'Descuento 10% en supermercado', 'descripcion' => 'Un cupón de descuento del 10% para usar en cualquier supermercado asociado.', 'puntos_requeridos' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Botella reutilizable', 'descripcion' => 'Una botella reutilizable de acero inoxidable.', 'puntos_requeridos' => 100, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Entrada gratis a evento ecológico', 'descripcion' => 'Entrada para un evento sobre sostenibilidad y medio ambiente.', 'puntos_requeridos' => 150, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('recompensas');
    }
};