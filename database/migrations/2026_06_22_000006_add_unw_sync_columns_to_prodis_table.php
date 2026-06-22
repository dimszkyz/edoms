<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prodis', function (Blueprint $table) {
            if (! Schema::hasColumn('prodis', 'unw_prodi_id')) {
                $table->unsignedBigInteger('unw_prodi_id')->nullable()->unique()->after('id');
            }

            if (! Schema::hasColumn('prodis', 'slug')) {
                $table->string('slug')->nullable()->after('nama');
            }

            if (! Schema::hasColumn('prodis', 'page_slug')) {
                $table->string('page_slug')->nullable()->after('slug');
            }

            if (! Schema::hasColumn('prodis', 'jenjang')) {
                $table->string('jenjang')->nullable()->after('page_slug');
            }

            if (! Schema::hasColumn('prodis', 'jenjang_nama_singkat')) {
                $table->string('jenjang_nama_singkat')->nullable()->after('jenjang');
            }

            if (! Schema::hasColumn('prodis', 'fakultas_unw_id')) {
                $table->unsignedBigInteger('fakultas_unw_id')->nullable()->after('jenjang_nama_singkat');
            }

            if (! Schema::hasColumn('prodis', 'fakultas_nama')) {
                $table->string('fakultas_nama')->nullable()->after('fakultas_unw_id');
            }

            if (! Schema::hasColumn('prodis', 'fakultas_page_slug')) {
                $table->string('fakultas_page_slug')->nullable()->after('fakultas_nama');
            }

            if (! Schema::hasColumn('prodis', 'api_updated_at')) {
                $table->timestamp('api_updated_at')->nullable()->after('fakultas_page_slug');
            }

            if (! Schema::hasColumn('prodis', 'synced_at')) {
                $table->timestamp('synced_at')->nullable()->after('api_updated_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('prodis', function (Blueprint $table) {
            if (Schema::hasColumn('prodis', 'unw_prodi_id')) {
                $table->dropUnique(['unw_prodi_id']);
            }

            $columns = [
                'unw_prodi_id',
                'slug',
                'page_slug',
                'jenjang',
                'jenjang_nama_singkat',
                'fakultas_unw_id',
                'fakultas_nama',
                'fakultas_page_slug',
                'api_updated_at',
                'synced_at',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('prodis', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
