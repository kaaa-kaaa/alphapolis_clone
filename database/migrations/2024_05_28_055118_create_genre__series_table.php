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
        Schema::create('genre__series', function (Blueprint $table) {
            $table->id();

            $table->foreignId('genre_id')
                ->constrained('genres');
            $table->foreignId('series_id')
                ->constrained('series');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre__series');
    }
};
