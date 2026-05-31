<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('industry_trends', function (Blueprint $table) {
            $table->id('trend_id');
            $table->string('skill_name', 100);
            $table->string('category', 50); // e.g. "Frontend", "Backend", "AI", "Data", "Cyber", "UI/UX"
            $table->enum('demand_level', ['high', 'medium', 'low'])->default('medium');
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industry_trends');
    }
};
