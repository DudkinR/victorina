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
        Schema::create('game_topic', function (Blueprint $table) {
             $table->id();
            $table->foreignId('topic_id')->constrained();
            $table->foreignId('game_id')->constrained();
        });
        Schema::create('game_page', function (Blueprint $table) {
             $table->id();
            $table->foreignId('page_id')->constrained();
            $table->foreignId('game_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('game_topic');
       Schema::dropIfExists('game_topic');
    }
};
