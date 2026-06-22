<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $edom->nama_edom }} - EDOM Universitas Ngudi Waluyo</title>

    <style>
        :root {
            --edom-primary: #022B63;
            --edom-secondary: #1e1b7a;
            --edom-accent: #dc2626;
            --edom-border: #e2e8f0;
            --edom-soft: #f8fafc;
            --edom-text: #102347;
            --edom-muted: #64748b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            color: var(--edom-text);
            font-family: Arial, Helvetica, sans-serif;
        }

        .edom-public-main {
            min-height: 70vh;
            padding: 0 16px 56px;
        }

        .edom-public-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .edom-form-card {
            background: #ffffff;
            border: 1px solid var(--edom-border);
            border-top: 0;
            box-shadow: 0 18px 45px rgba(2, 43, 99, 0.08);
            overflow: hidden;
        }

        .edom-form-header {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 26px 32px;
            border-bottom: 1px solid var(--edom-border);
            background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        }

        .edom-form-eyebrow {
            margin: 0 0 8px;
            color: var(--edom-secondary);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        .edom-form-title {
            margin: 0;
            color: var(--edom-primary);
            font-size: 28px;
            line-height: 1.25;
            font-weight: 800;
        }

        .edom-form-subtitle {
            margin: 10px 0 0;
            color: var(--edom-muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .edom-info-pills {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            min-width: 260px;
        }

        .edom-pill {
            display: inline-flex;
            align-items: center;
            min-height: 38px;
            padding: 8px 13px;
            border-radius: 999px;
            background: #ffffff;
            border: 1px solid #dbeafe;
            color: var(--edom-primary);
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.04);
        }

        .edom-alert {
            margin: 22px 32px 0;
            padding: 14px 16px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.6;
        }

        .edom-alert-success {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .edom-alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .edom-identity-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            padding: 24px 32px 0;
        }

        .edom-field label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 800;
        }

        .edom-field input {
            width: 100%;
            height: 44px;
            padding: 10px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            color: var(--edom-text);
            font-size: 14px;
            outline: none;
            transition: 0.2s ease;
        }

        .edom-field input:focus {
            border-color: var(--edom-primary);
            box-shadow: 0 0 0 3px rgba(2, 43, 99, 0.12);
        }

        .edom-table-area {
            padding: 24px 32px 32px;
        }

        .edom-table-helper {
            margin: 0 0 14px;
            color: var(--edom-muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .edom-table-wrap {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--edom-border);
            background: #ffffff;
        }

        .edom-input-table {
            width: 100%;
            min-width: 980px;
            border-collapse: collapse;
            table-layout: fixed;
            background: #ffffff;
        }

        .edom-input-table th,
        .edom-input-table td {
            border-right: 1px solid var(--edom-border);
            border-bottom: 1px solid var(--edom-border);
            padding: 16px 18px;
            vertical-align: middle;
        }

        .edom-input-table th:last-child,
        .edom-input-table td:last-child {
            border-right: 0;
        }

        .edom-input-table thead th {
            background: #f1f5f9;
            color: #0f172a;
            font-size: 13px;
            font-weight: 900;
            line-height: 1.25;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: center;
        }

        .edom-col-number {
            width: 68px;
            text-align: center;
        }

        .edom-col-statement {
            width: 56%;
        }

        .edom-col-option {
            width: 110px;
            text-align: center;
        }

        .edom-category-row td {
            padding: 18px 24px;
            background: var(--edom-soft);
            color: var(--edom-secondary);
            font-size: 14px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .edom-question-number {
            color: #334155;
            font-size: 16px;
            font-weight: 700;
            text-align: center;
        }

        .edom-question-text {
            color: #12315c;
            font-size: 16px;
            line-height: 1.65;
        }

        .edom-choice-cell {
            text-align: center;
        }

        .edom-choice-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 999px;
            cursor: pointer;
        }

        .edom-choice-input {
            appearance: none;
            -webkit-appearance: none;
            display: grid;
            place-content: center;
            width: 24px;
            height: 24px;
            margin: 0;
            border: 1.8px solid #cbd5e1;
            border-radius: 999px;
            background: #f8fafc;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .edom-choice-input::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #ffffff;
            transform: scale(0);
            transition: 0.15s ease;
        }

        .edom-choice-input:hover {
            border-color: var(--edom-accent);
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.08);
        }

        .edom-choice-input:checked {
            border-color: var(--edom-accent);
            background: var(--edom-accent);
            box-shadow: 0 0 0 5px rgba(220, 38, 38, 0.1);
        }

        .edom-choice-input:checked::before {
            transform: scale(1);
        }

        .edom-essay-input {
            width: 100%;
            min-height: 90px;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            color: var(--edom-text);
            font-family: inherit;
            font-size: 14px;
            line-height: 1.6;
            resize: vertical;
            outline: none;
        }

        .edom-essay-input:focus {
            border-color: var(--edom-primary);
            box-shadow: 0 0 0 3px rgba(2, 43, 99, 0.12);
        }

        .edom-empty-state {
            padding: 38px 24px;
            text-align: center;
            color: var(--edom-muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .edom-action-bar {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding: 0 32px 32px;
        }

        .edom-submit-button {
            border: 0;
            border-radius: 12px;
            padding: 13px 24px;
            background: var(--edom-primary);
            color: #ffffff;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
            box-shadow: 0 12px 24px rgba(2, 43, 99, 0.2);
        }

        .edom-submit-button:hover {
            transform: translateY(-1px);
            background: #013a86;
        }

        .edom-submit-button:disabled {
            opacity: 0.55;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        @media (max-width: 900px) {
            .edom-form-header {
                flex-direction: column;
                padding: 24px;
            }

            .edom-info-pills {
                justify-content: flex-start;
                min-width: 0;
            }

            .edom-identity-grid,
            .edom-table-area,
            .edom-action-bar {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media (max-width: 640px) {
            .edom-public-main {
                padding: 0 10px 36px;
            }

            .edom-form-title {
                font-size: 22px;
            }

            .edom-identity-grid {
                grid-template-columns: 1fr;
            }

            .edom-alert {
                margin-left: 18px;
                margin-right: 18px;
            }
        }
    </style>
</head>
<body>
    @include('component.header')

    @php
        $options = $edom->options;
        $hasQuestions = $edom->categories->sum(fn ($category) => $category->questions->count()) > 0;
        $canSubmit = $hasQuestions && $options->isNotEmpty();
        $questionNumber = 1;
        $toRoman = function (int $number): string {
            $map = [
                'M' => 1000,
                'CM' => 900,
                'D' => 500,
                'CD' => 400,
                'C' => 100,
                'XC' => 90,
                'L' => 50,
                'XL' => 40,
                'X' => 10,
                'IX' => 9,
                'V' => 5,
                'IV' => 4,
                'I' => 1,
            ];
            $result = '';

            foreach ($map as $roman => $value) {
                while ($number >= $value) {
                    $result .= $roman;
                    $number -= $value;
                }
            }

            return $result;
        };

        $formatCategoryTitle = function (?string $title, int $index) use ($toRoman): string {
            $title = trim((string) $title);
            $title = $title !== '' ? $title : 'Kategori ' . ($index + 1);
            $title = preg_replace('/^([IVXLCDM]+)\.\s+\1\.\s+/i', '$1. ', $title);

            if (! preg_match('/^[IVXLCDM]+\.\s+/i', $title)) {
                $title = $toRoman($index + 1) . '. ' . $title;
            }

            return $title;
        };
    @endphp

    <main class="edom-public-main">
        <div class="edom-public-container">
            <form method="POST" action="{{ route('edom.home.submit') }}" class="edom-form-card">
                @csrf
                <input type="hidden" name="edom_id" value="{{ $edom->id }}">

                <div class="edom-form-header">
                    <div>
                        <p class="edom-form-eyebrow">Form Evaluasi Dosen Oleh Mahasiswa</p>
                        <h1 class="edom-form-title">{{ $edom->nama_edom }}</h1>
                        <p class="edom-form-subtitle">
                            Silakan pilih salah satu jawaban pada setiap pernyataan evaluasi. Jawaban Anda akan digunakan untuk peningkatan kualitas pembelajaran.
                        </p>
                    </div>

                    <div class="edom-info-pills">
                        <span class="edom-pill">Status: {{ strtoupper($edom->status ?? '-') }}</span>
                        <span class="edom-pill">{{ $edom->prodis->pluck('nama')->join(', ') ?: 'Semua Prodi' }}</span>
                        <span class="edom-pill">{{ $edom->mataKuliahs->pluck('nama')->join(', ') ?: 'Semua Mata Kuliah' }}</span>
                    </div>
                </div>

                @if (session('success'))
                    <div class="edom-alert edom-alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="edom-alert edom-alert-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="edom-identity-grid">
                    <div class="edom-field">
                        <label for="nama_responden">Nama Mahasiswa <span style="color:#94a3b8;font-weight:600;">(opsional)</span></label>
                        <input type="text" id="nama_responden" name="nama_responden" value="{{ old('nama_responden') }}" placeholder="Masukkan nama mahasiswa">
                    </div>

                    <div class="edom-field">
                        <label for="nim">NIM <span style="color:#94a3b8;font-weight:600;">(opsional)</span></label>
                        <input type="text" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM">
                    </div>
                </div>

                <div class="edom-table-area">
                    <p class="edom-table-helper">
                        Gunakan skala penilaian yang tersedia pada kolom kanan. Geser tabel ke samping jika dibuka melalui layar kecil.
                    </p>

                    <div class="edom-table-wrap">
                        <table class="edom-input-table">
                            <colgroup>
                                <col class="edom-col-number">
                                <col class="edom-col-statement">
                                @foreach ($options as $option)
                                    <col class="edom-col-option">
                                @endforeach
                            </colgroup>

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pernyataan Evaluasi</th>
                                    @foreach ($options as $option)
                                        <th>{{ $option->label }}</th>
                                    @endforeach
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($edom->categories as $categoryIndex => $category)
                                    <tr class="edom-category-row">
                                        <td colspan="{{ $options->count() + 2 }}">
                                            {{ strtoupper($formatCategoryTitle($category->nama_kategori, $categoryIndex)) }}
                                        </td>
                                    </tr>

                                    @forelse ($category->questions as $question)
                                        <tr>
                                            <td class="edom-question-number">{{ $questionNumber++ }}</td>
                                            <td class="edom-question-text">{{ $question->pernyataan }}</td>

                                            @if (in_array(strtolower((string) $question->tipe_soal), ['essay', 'esai', 'uraian', 'text', 'textarea'], true))
                                                <td colspan="{{ max($options->count(), 1) }}">
                                                    <textarea
                                                        name="essays[{{ $question->id }}]"
                                                        class="edom-essay-input"
                                                        placeholder="Tulis jawaban Anda di sini..."
                                                    >{{ old("essays.{$question->id}") }}</textarea>
                                                </td>
                                            @elseif ($options->isNotEmpty())
                                                @foreach ($options as $option)
                                                    <td class="edom-choice-cell">
                                                        <label class="edom-choice-label" for="answer-{{ $question->id }}-{{ $option->id }}">
                                                            <input
                                                                type="radio"
                                                                id="answer-{{ $question->id }}-{{ $option->id }}"
                                                                name="answers[{{ $question->id }}]"
                                                                value="{{ $option->id }}"
                                                                class="edom-choice-input"
                                                                @checked(old("answers.{$question->id}") == $option->id)
                                                                required
                                                            >
                                                        </label>
                                                    </td>
                                                @endforeach
                                            @else
                                                <td>
                                                    Opsi jawaban belum tersedia.
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{ $options->count() + 2 }}" class="edom-empty-state">
                                                Belum ada pernyataan pada kategori ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td colspan="{{ $options->count() + 2 }}" class="edom-empty-state">
                                            Belum ada kategori dan pernyataan EDOM yang bisa ditampilkan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="edom-action-bar">
                    <button type="submit" class="edom-submit-button" @disabled(! $canSubmit)>
                        Kirim Jawaban
                    </button>
                </div>
            </form>
        </div>
    </main>

    @include('component.footer')
</body>
</html>
