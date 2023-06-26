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
        Schema::table('answers', function (Blueprint $table) {
            // addcolumn after content  user_id and разрешение по умолчанию 0
$table->integer('user_id')->after('content')->default(0);
$table->integer('permission')->after('user_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            // delete columns
$table->dropColumn('user_id');
$table->dropColumn('permission');

        });
    }
};
