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
        Schema::create('batubaras', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('lokasi');
            $table->string('driver');
            $table->integer('jumlah_retase');
            $table->integer('jumlah_bucket');
            $table->decimal('estimasi_tonase', 10, 2);
            $table->string('dt_gendong');
            $table->string('tujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batubaras');
    }
};
