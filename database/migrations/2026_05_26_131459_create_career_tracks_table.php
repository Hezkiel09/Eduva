<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_tracks', function (Blueprint $table) {
            $table->id('track_id');
            $table->string('slug')->unique(); // frontend, backend, uiux, data, ai, cyber
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('roadmap');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_tracks');
    }
};