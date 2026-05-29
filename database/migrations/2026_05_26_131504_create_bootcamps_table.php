<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bootcamps', function (Blueprint $table) {
            $table->id('bootcamp_id');
            $table->unsignedBigInteger('track_id');
            $table->string('name');
            $table->string('url', 500);
            $table->text('description')->nullable();

            $table->foreign('track_id')
                  ->references('track_id')
                  ->on('career_tracks')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bootcamps');
    }
};