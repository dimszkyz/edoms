<?php

namespace App\Services;

use App\Models\Prodi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Throwable;

class UnwProgramStudiSyncService
{
    public function sync(): array
    {
        $url = config('services.unw_program_studi.url');

        $response = Http::acceptJson()
            ->timeout(30)
            ->retry(2, 1000)
            ->get($url);

        if (! $response->successful()) {
            throw new RuntimeException('API Program Studi UNW gagal diakses. Status: ' . $response->status());
        }

        $items = data_get($response->json(), 'data');

        if (! is_array($items)) {
            throw new RuntimeException('Format response API Program Studi UNW tidak valid.');
        }

        $created = 0;
        $updated = 0;
        $skipped = 0;

        foreach ($items as $item) {
            $externalId = data_get($item, 'id');
            $nama = trim((string) data_get($item, 'nama'));

            if (blank($externalId) || $nama === '') {
                $skipped++;
                continue;
            }

            $attributes = [
                'nama' => $nama,
                'slug' => data_get($item, 'slug'),
                'page_slug' => data_get($item, 'page_slug'),
                'jenjang' => data_get($item, 'jenjang'),
                'jenjang_nama_singkat' => data_get($item, 'jenjang_nama_singkat'),
                'fakultas_unw_id' => data_get($item, 'unwFakultas.id'),
                'fakultas_nama' => trim((string) data_get($item, 'unwFakultas.nama')),
                'fakultas_page_slug' => data_get($item, 'unwFakultas.page_slug'),
                'api_updated_at' => $this->parseDate(data_get($item, 'updatedAt')),
                'synced_at' => now(),
            ];

            $prodi = Prodi::query()
                ->where('unw_prodi_id', $externalId)
                ->first();

            if ($prodi) {
                $prodi->update($attributes);
                $updated++;
                continue;
            }

            Prodi::query()->create([
                'unw_prodi_id' => $externalId,
                ...$attributes,
            ]);

            $created++;
        }

        return [
            'created' => $created,
            'updated' => $updated,
            'skipped' => $skipped,
            'total' => count($items),
        ];
    }

    private function parseDate(mixed $value): ?Carbon
    {
        if (blank($value)) {
            return null;
        }

        try {
            return Carbon::parse($value);
        } catch (Throwable) {
            return null;
        }
    }
}
