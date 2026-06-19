<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('edom_mata_kuliah', function (Blueprint $table) {

            $table->id();

            $table->foreignId('edom_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('mata_kuliah_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unique([
                'edom_id',
                'mata_kuliah_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('edom_mata_kuliah');
    }
};