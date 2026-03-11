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
		Schema::create('lecturas', function (Blueprint $table) {
			$table->id();
			$table->string('titulo');
			$table->string('autor');
			$table->string('estado');
			$table->date('fecha_inicio')->nullable();
			$table->date('fecha_fin')->nullable();
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturas');
    }
};
