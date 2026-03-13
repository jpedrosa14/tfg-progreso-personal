<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registro_habitos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('habito_id')
                ->constrained()
                ->onDelete('cascade');

            $table->date('fecha');

            $table->boolean('completado')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registro_habitos');
    }
};
