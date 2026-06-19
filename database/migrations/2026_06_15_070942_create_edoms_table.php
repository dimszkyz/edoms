<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('edoms', function (Blueprint $table) {
        $table->id();

        $table->string('nama_edom');

        $table->date('tanggal_dibuat');

        $table->foreignId('prodi_id')
            ->constrained('prodis')
            ->cascadeOnDelete();

        $table->foreignId('mata_kuliah_id')
            ->constrained('mata_kuliahs')
            ->cascadeOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edoms');
    }
};
