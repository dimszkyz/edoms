<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('edoms', 'status')) {
            Schema::table('edoms', function (Blueprint $table) {
                $table->string('status')->default('draft')->after('tanggal_dibuat');
            });
        }

        if (! Schema::hasColumn('edom_options', 'edom_id')) {
            Schema::table('edom_options', function (Blueprint $table) {
                $table->foreignId('edom_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('edoms')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        // Rollback manual jika dibutuhkan: hapus kolom edoms.status dan edom_options.edom_id.
    }
};
