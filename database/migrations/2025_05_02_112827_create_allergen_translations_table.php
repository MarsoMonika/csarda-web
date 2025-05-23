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
        Schema::create('allergen_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('allergen_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('name');

            $table->unique(['allergen_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergen_translations');
    }
};
