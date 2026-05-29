<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id('answer_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('option_id');
            $table->timestamp('answered_at')->useCurrent();

            $table->foreign('session_id')
                  ->references('session_id')
                  ->on('assessment_sessions')
                  ->cascadeOnDelete();

            $table->foreign('question_id')
                  ->references('question_id')
                  ->on('questions')
                  ->cascadeOnDelete();

            $table->foreign('option_id')
                  ->references('option_id')
                  ->on('options')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};