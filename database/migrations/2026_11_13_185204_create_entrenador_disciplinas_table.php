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
        Schema::create('entrenador_disciplinas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('entrenador_id')->nullable();

           $table->foreign('entrenador_id')
           ->references('id')
           ->on('entrenadors')
           ->onDelete('set null')
           ->onUpdate('set null');

           $table->unsignedBigInteger('disciplina_id')->nullable();

           $table->foreign('disciplina_id')
           ->references('id')
           ->on('disciplinas')
           ->onDelete('set null')
           ->onUpdate('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrenador_disciplinas');
    }
};
