<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessment_results', function (Blueprint $table) {
            $table->id('result_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('track_id');
            $table->json('track_scores');
            // contoh: {"frontend":24,"backend":18,"uiux":12,"data":8,"ai":6,"cyber":5}
            $table->string('top_track', 50);
            $table->enum('readiness_level', ['beginner', 'intermediate', 'advanced'])
                  ->default('beginner');
            $table->timestamp('submitted_at')->useCurrent();

            $table->foreign('session_id')
                  ->references('session_id')
                  ->on('assessment_sessions')
                  ->cascadeOnDelete();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->foreign('track_id')
                  ->references('track_id')
                  ->on('career_tracks');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_results');
    }
};