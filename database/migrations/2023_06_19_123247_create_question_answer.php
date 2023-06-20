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
        if(Schema::hasTable('question_answer'))
        {
             Schema::dropIfExists('question_answer');
        }
    Schema::create('question_answer', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
        $table->foreignId('answer_id')->constrained('answers')->onDelete('cascade');
        $table->boolean('is_correct')->default(false);

    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answer');
    }
};
