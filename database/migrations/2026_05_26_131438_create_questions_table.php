<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id('question_id');
            $table->unsignedBigInteger('assessment_id');
            $table->text('question_text');
            $table->integer('order_number')->default(0);
            $table->timestamps();

            $table->foreign('assessment_id')
                  ->references('assessment_id')
                  ->on('assessments')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};