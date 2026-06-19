<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('edom_prodi', function (Blueprint $table) {

            $table->id();

            $table->foreignId('edom_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('prodi_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('edom_prodi');
    }
};