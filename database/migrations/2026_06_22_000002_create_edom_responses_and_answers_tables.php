<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('edom_responses')) {
            Schema::create('edom_responses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('edom_id')->constrained('edoms')->cascadeOnDelete();
                $table->string('nama_responden')->nullable();
                $table->string('nim')->nullable();
                $table->timestamp('submitted_at')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('edom_answers')) {
            Schema::create('edom_answers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('edom_response_id')->constrained('edom_responses')->cascadeOnDelete();
                $table->foreignId('edom_question_id')->constrained('edom_questions')->cascadeOnDelete();
                $table->foreignId('edom_option_id')->nullable()->constrained('edom_options')->nullOnDelete();
                $table->text('jawaban_teks')->nullable();
                $table->integer('nilai')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Rollback manual jika dibutuhkan: hapus tabel edom_answers lalu edom_responses.
    }
};
