<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('edom_options', function (Blueprint $table) {
            $table->foreignId('question_id')
                ->nullable()
                ->after('id')
                ->constrained('edom_questions')
                ->cascadeOnDelete();
        });
    }
    
    public function down(): void
    {
        Schema::table('edom_options', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');
        });
    }
};
