<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->addSnapshotColumns();
        $this->backfillExistingSnapshots();
        $this->makeHistoricalRelationsNullable();
    }

    private function addSnapshotColumns(): void
    {
        if (Schema::hasTable('edom_responses')) {
            Schema::table('edom_responses', function (Blueprint $table) {
                if (! Schema::hasColumn('edom_responses', 'nama_edom_snapshot')) {
                    $table->string('nama_edom_snapshot')->nullable()->after('edom_id');
                }

                if (! Schema::hasColumn('edom_responses', 'prodi_snapshot')) {
                    $table->text('prodi_snapshot')->nullable()->after('nama_edom_snapshot');
                }

                if (! Schema::hasColumn('edom_responses', 'mata_kuliah_snapshot')) {
                    $table->text('mata_kuliah_snapshot')->nullable()->after('prodi_snapshot');
                }
            });
        }

        if (Schema::hasTable('edom_answers')) {
            Schema::table('edom_answers', function (Blueprint $table) {
                if (! Schema::hasColumn('edom_answers', 'nama_kategori_snapshot')) {
                    $table->string('nama_kategori_snapshot')->nullable()->after('edom_question_id');
                }

                if (! Schema::hasColumn('edom_answers', 'pernyataan_snapshot')) {
                    $table->text('pernyataan_snapshot')->nullable()->after('nama_kategori_snapshot');
                }

                if (! Schema::hasColumn('edom_answers', 'option_label_snapshot')) {
                    $table->string('option_label_snapshot')->nullable()->after('edom_option_id');
                }

                if (! Schema::hasColumn('edom_answers', 'option_nilai_snapshot')) {
                    $table->integer('option_nilai_snapshot')->nullable()->after('option_label_snapshot');
                }
            });
        }
    }

    private function backfillExistingSnapshots(): void
    {
        if (Schema::hasTable('edom_responses')) {
            DB::table('edom_responses')
                ->orderBy('id')
                ->chunkById(100, function ($responses) {
                    foreach ($responses as $response) {
                        $edom = DB::table('edoms')->where('id', $response->edom_id)->first();

                        if (! $edom) {
                            continue;
                        }

                        $prodis = $this->joinedNames('edom_prodi', 'prodis', 'prodi_id', $edom->id);
                        $mataKuliahs = $this->joinedNames('edom_mata_kuliah', 'mata_kuliahs', 'mata_kuliah_id', $edom->id);

                        DB::table('edom_responses')
                            ->where('id', $response->id)
                            ->update([
                                'nama_edom_snapshot' => $response->nama_edom_snapshot ?: $edom->nama_edom,
                                'prodi_snapshot' => $response->prodi_snapshot ?: $prodis,
                                'mata_kuliah_snapshot' => $response->mata_kuliah_snapshot ?: $mataKuliahs,
                            ]);
                    }
                });
        }

        if (Schema::hasTable('edom_answers')) {
            DB::table('edom_answers')
                ->orderBy('id')
                ->chunkById(100, function ($answers) {
                    foreach ($answers as $answer) {
                        $question = DB::table('edom_questions')->where('id', $answer->edom_question_id)->first();
                        $categoryName = null;

                        if ($question) {
                            $categoryName = DB::table('edom_categories')
                                ->where('id', $question->category_id)
                                ->value('nama_kategori');
                        }

                        $option = $answer->edom_option_id
                            ? DB::table('edom_options')->where('id', $answer->edom_option_id)->first()
                            : null;

                        DB::table('edom_answers')
                            ->where('id', $answer->id)
                            ->update([
                                'nama_kategori_snapshot' => $answer->nama_kategori_snapshot ?: $categoryName,
                                'pernyataan_snapshot' => $answer->pernyataan_snapshot ?: $question?->pernyataan,
                                'option_label_snapshot' => $answer->option_label_snapshot ?: $option?->label,
                                'option_nilai_snapshot' => $answer->option_nilai_snapshot ?: ($option?->nilai ?? $answer->nilai),
                            ]);
                    }
                });
        }
    }

    private function joinedNames(string $pivotTable, string $targetTable, string $targetKey, int $edomId): ?string
    {
        if (! Schema::hasTable($pivotTable) || ! Schema::hasTable($targetTable)) {
            return null;
        }

        $names = DB::table($pivotTable)
            ->join($targetTable, "{$targetTable}.id", '=', "{$pivotTable}.{$targetKey}")
            ->where("{$pivotTable}.edom_id", $edomId)
            ->orderBy("{$targetTable}.nama")
            ->pluck("{$targetTable}.nama")
            ->filter()
            ->values()
            ->all();

        return $names ? implode(', ', $names) : null;
    }

    private function makeHistoricalRelationsNullable(): void
    {
        if (! Schema::hasTable('edom_responses') || ! Schema::hasTable('edom_answers')) {
            return;
        }

        $this->dropForeignIfExists('edom_answers', 'edom_answers_edom_question_id_foreign');
        $this->dropForeignIfExists('edom_responses', 'edom_responses_edom_id_foreign');

        Schema::table('edom_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('edom_question_id')->nullable()->change();
        });

        Schema::table('edom_responses', function (Blueprint $table) {
            $table->unsignedBigInteger('edom_id')->nullable()->change();
        });

        Schema::table('edom_answers', function (Blueprint $table) {
            $table->foreign('edom_question_id')
                ->references('id')
                ->on('edom_questions')
                ->nullOnDelete();
        });

        Schema::table('edom_responses', function (Blueprint $table) {
            $table->foreign('edom_id')
                ->references('id')
                ->on('edoms')
                ->nullOnDelete();
        });
    }

    private function dropForeignIfExists(string $table, string $foreignKey): void
    {
        try {
            Schema::table($table, function (Blueprint $table) use ($foreignKey) {
                $table->dropForeign($foreignKey);
            });
        } catch (Throwable) {
            // Foreign key may already be absent on some local databases.
        }
    }

    public function down(): void
    {
        // Historical snapshots are intentionally kept. Restore constraints manually only if needed.
    }
};
