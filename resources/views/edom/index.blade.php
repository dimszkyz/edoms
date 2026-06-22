<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDOM Universitas Ngudi Waluyo</title>
    <style>
        body { margin: 0; background: #f4f7fb; color: #102347; font-family: Arial, Helvetica, sans-serif; }
        .page { min-height: 70vh; padding: 40px 16px 64px; }
        .container { max-width: 1100px; margin: 0 auto; }
        .hero { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 32px; box-shadow: 0 18px 45px rgba(2, 43, 99, .08); }
        .eyebrow { margin: 0 0 8px; color: #1e1b7a; font-size: 13px; font-weight: 800; letter-spacing: 1.6px; text-transform: uppercase; }
        h1 { margin: 0; color: #022B63; font-size: 32px; line-height: 1.25; }
        .lead { margin: 12px 0 0; color: #64748b; font-size: 16px; line-height: 1.75; }
        .alert { margin-top: 18px; padding: 14px 16px; border-radius: 12px; font-size: 14px; line-height: 1.6; }
        .success { background: #ecfdf5; border: 1px solid #bbf7d0; color: #166534; }
        .error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .section { margin-top: 28px; }
        .section-title { margin: 0 0 14px; color: #022B63; font-size: 20px; }
        .grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; box-shadow: 0 10px 28px rgba(2, 43, 99, .06); }
        .card h2 { margin: 0 0 10px; color: #102347; font-size: 18px; }
        .meta { margin: 0 0 14px; color: #64748b; font-size: 14px; line-height: 1.6; }
        .badge { display: inline-flex; align-items: center; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 800; text-transform: uppercase; }
        .badge-active { background: #dcfce7; color: #166534; }
        .badge-closed { background: #f1f5f9; color: #475569; }
        .button { display: inline-flex; align-items: center; justify-content: center; min-height: 42px; padding: 10px 16px; border-radius: 12px; background: #022B63; color: #fff; font-size: 14px; font-weight: 800; text-decoration: none; }
        .button-muted { background: #e2e8f0; color: #475569; cursor: not-allowed; }
        .empty { background: #fff; border: 1px dashed #cbd5e1; border-radius: 16px; padding: 28px; color: #64748b; line-height: 1.7; text-align: center; }
        @media (max-width: 760px) { .grid { grid-template-columns: 1fr; } h1 { font-size: 26px; } .hero { padding: 24px; } }
    </style>
</head>
<body>
    @include('component.header')

    <main class="page">
        <div class="container">
            <section class="hero">
                <p class="eyebrow">Evaluasi Dosen Oleh Mahasiswa</p>
                <h1>EDOM Universitas Ngudi Waluyo</h1>
                <p class="lead">
                    Halaman ini menampilkan EDOM yang sedang aktif. Jika hanya ada satu EDOM aktif, form akan langsung terbuka di halaman utama.
                </p>

                @if (session('success'))
                    <div class="alert success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert error">{{ session('error') }}</div>
                @endif
            </section>

            <section class="section">
                <h2 class="section-title">EDOM Aktif</h2>

                @if ($activeEdoms->isNotEmpty())
                    <div class="grid">
                        @foreach ($activeEdoms as $edom)
                            <article class="card">
                                <span class="badge badge-active">Aktif</span>
                                <h2>{{ $edom->nama_edom }}</h2>
                                <p class="meta">
                                    {{ $edom->prodis->pluck('nama')->join(', ') ?: 'Semua Prodi' }}<br>
                                    {{ $edom->mataKuliahs->pluck('nama')->join(', ') ?: 'Semua Mata Kuliah' }}<br>
                                    {{ $edom->questions_count }} pernyataan dalam {{ $edom->categories_count }} kategori
                                </p>
                                <a class="button" href="{{ route('edom.home', ['edom' => $edom->id]) }}">Isi EDOM</a>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="empty">
                        Belum ada EDOM yang aktif saat ini.
                        @if ($draftCount > 0)
                            <br>Belum ada EDOM yang aktif untuk saat ini, harap tunggu dan kembali beberapa saat lagi.
                        @endif
                    </div>
                @endif
            </section>

            @if ($closedEdoms->isNotEmpty())
                <section class="section">
                    <h2 class="section-title">EDOM yang Sudah Ditutup</h2>
                    <div class="grid">
                        @foreach ($closedEdoms as $edom)
                            <article class="card">
                                <span class="badge badge-closed">Ditutup</span>
                                <h2>{{ $edom->nama_edom }}</h2>
                                <p class="meta">
                                    {{ $edom->prodis->pluck('nama')->join(', ') ?: 'Semua Prodi' }}<br>
                                    {{ $edom->mataKuliahs->pluck('nama')->join(', ') ?: 'Semua Mata Kuliah' }}
                                </p>
                                <span class="button button-muted">Pengisian Ditutup</span>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </main>

    @include('component.footer')
</body>
</html>
