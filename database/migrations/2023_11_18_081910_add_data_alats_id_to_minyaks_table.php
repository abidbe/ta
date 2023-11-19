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
        Schema::table('minyaks', function (Blueprint $table) {
            $table->foreignId('data_alats_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('minyaks', function (Blueprint $table) {
            $table->dropForeign(['data_alats_id']);
            $table->dropColumn('data_alats_id');
        });
    }
};
