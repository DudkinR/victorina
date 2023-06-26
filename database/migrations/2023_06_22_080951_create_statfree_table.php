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
        Schema::create('statfree', function (Blueprint $table) {
            $table->id();
            //topic_id
$table->unsignedBigInteger('topic_id');
            $table->foreign('topic_id')->references('id')->on('topics');
            // id question
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
            // result integer 0  - 100
            $table->integer('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statfree');
    }
};
