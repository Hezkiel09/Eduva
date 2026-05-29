<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skill_gaps', function (Blueprint $table) {
            $table->id('skill_gap_id');
            $table->unsignedBigInteger('result_id');
            $table->string('skill_name');
            $table->enum('gap_level', ['low', 'medium', 'high']);

            $table->foreign('result_id')
                  ->references('result_id')
                  ->on('assessment_results')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skill_gaps');
    }
};