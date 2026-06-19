<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('edom_options', function (Blueprint $table) {

            $table->foreignId('edom_id')
                ->nullable()
                ->after('id');
        });

        Schema::table('edom_options', function (Blueprint $table) {

            try {
                $table->dropForeign(['question_id']);
            } catch (\Throwable $e) {
                //
            }

            if (Schema::hasColumn('edom_options', 'question_id')) {
                $table->dropColumn('question_id');
            }

            $table->foreign('edom_id')
                ->references('id')
                ->on('edoms')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('edom_options', function (Blueprint $table) {

            try {
                $table->dropForeign(['edom_id']);
            } catch (\Throwable $e) {
                //
            }

            if (Schema::hasColumn('edom_options', 'edom_id')) {
                $table->dropColumn('edom_id');
            }

            $table->foreignId('question_id')
                ->nullable()
                ->after('id')
                ->constrained('edom_questions')
                ->cascadeOnDelete();
        });
    }
};
