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
        Schema::create('minyaks', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Pemasukan atau Pengeluaran
            $table->integer('amount'); // Jumlah minyak yang masuk atau keluar
            $table->text('keterangan');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minyaks');
    }
};
