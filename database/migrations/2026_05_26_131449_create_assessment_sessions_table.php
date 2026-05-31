<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('assessment_sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assessment_id');
            $table->enum('session_status', ['in_progress', 'completed', 'abandoned'])
                  ->default('in_progress');
            $table->decimal('progress_percentage', 5, 2)->default(0);
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('ended_at')->nullable();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->foreign('assessment_id')
                  ->references('assessment_id')
                  ->on('assessments')
                  ->cascadeOnDelete();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('assessment_sessions');
    }
};
