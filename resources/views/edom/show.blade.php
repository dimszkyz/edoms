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
            --edom-purple: #4f46e5;
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
            padding: 40px 16px 56px;
        }

        .edom-public-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .edom-form-card {
            margin: 0;
        }

        .edom-intro-card {
            position: relative;
            overflow: hidden;
            margin: 0 auto 28px;
            padding: 44px 52px 48px;
            background: #ffffff;
            border: 1px solid #e5eaf3;
            border-radius: 14px;
            box-shadow: 0 18px 45px rgba(2, 43, 99, 0.06);
        }

        .edom-intro-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 10px;
            background: var(--edom-purple);
        }

        .edom-intro-title {
            margin: 0;
            color: #071225;
            font-size: 34px;
            line-height: 1.18;
            font-weight: 900;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .edom-intro-subtitle {
            margin: 12px 0 28px;
            color: var(--edom-purple);
            font-size: 19px;
            line-height: 1.5;
            font-weight: 700;
        }

        .edom-guide-box {
            padding: 24px 28px;
            background: #eef2ff;
            border: 1px solid #dbe3ff;
            border-radius: 12px;
        }

        .edom-guide-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 14px;
            color: var(--edom-secondary);
            font-size: 17px;
            font-weight: 900;
        }

        .edom-guide-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border: 2px solid currentColor;
            border-radius: 999px;
            font-size: 14px;
            line-height: 1;
            font-weight: 900;
        }

        .edom-guide-text {
            margin: 0;
            color: #475569;
            font-size: 17px;
            line-height: 1.75;
        }

        .edom-scale-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .edom-scale-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 38px;
            padding: 8px 20px;
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.32);
            color: #0f172a;
            font-size: 15px;
            font-weight: 900;
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.06);
        }

        .edom-scale-badge.scale-1,
        .edom-scale-badge.scale-6 {
            background: #fee2e2;
            color: #b91c1c;
        }

        .edom-scale-badge.scale-2 {
            background: #ffedd5;
            color: #c2410c;
        }

        .edom-scale-badge.scale-3 {
            background: #dcfce7;
            color: #166534;
        }

        .edom-scale-badge.scale-4 {
            background: #e0e7ff;
            color: #3730a3;
        }

        .edom-scale-badge.scale-5 {
            background: #f8fafc;
            color: #102347;
        }

        .edom-alert {
            margin: 0 0 22px;
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

        .edom-table-area {
            margin: 0 auto;
        }

        .edom-table-wrap {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--edom-border);
            border-radius: 14px 14px 0 0;
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
            padding: 24px 0 0;
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
            .edom-public-main {
                padding-top: 24px;
            }

            .edom-intro-card {
                padding: 34px 28px 32px;
            }

            .edom-intro-title {
                font-size: 28px;
            }
        }

        @media (max-width: 640px) {
            .edom-public-main {
                padding: 18px 10px 36px;
            }

            .edom-intro-card {
                padding: 30px 20px 24px;
            }

            .edom-intro-title {
                font-size: 23px;
            }

            .edom-intro-subtitle,
            .edom-guide-text {
                font-size: 15px;
            }

            .edom-guide-box {
                padding: 18px;
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

                <section class="edom-intro-card" aria-labelledby="edom-intro-title">
                    <h1 id="edom-intro-title" class="edom-intro-title">EVALUASI DOSEN OLEH MAHASISWA</h1>
                    <p class="edom-intro-subtitle">Instrumen Penilaian Akademik (EDOM)</p>

                    <div class="edom-guide-box">
                        <p class="edom-guide-title">
                            <span class="edom-guide-icon">i</span>
                            Petunjuk Pengisian
                        </p>
                        <p class="edom-guide-text">
                            Pilihlah satu jawaban yang paling mencerminkan kondisi nyata di kelas dengan memberikan tanda centang atau klik pada salah satu skala di dalam tabel berikut:
                        </p>

                        @if ($options->isNotEmpty())
                            <div class="edom-scale-list" aria-label="Skala penilaian EDOM">
                                @foreach ($options as $option)
                                    @php
                                        $scaleValue = $option->nilai ?: $loop->iteration;
                                        $scaleLabel = ucwords(strtolower((string) $option->label));
                                        $scaleClass = (($loop->index % 6) + 1);
                                    @endphp
                                    <span class="edom-scale-badge scale-{{ $scaleClass }}">
                                        {{ $scaleValue }} = {{ $scaleLabel }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </section>

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

                <div class="edom-table-area">
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
