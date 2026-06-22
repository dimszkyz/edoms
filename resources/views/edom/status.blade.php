<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $statusTitle }} - EDOM Universitas Ngudi Waluyo</title>
    <style>
        body { margin: 0; background: #f4f7fb; color: #102347; font-family: Arial, Helvetica, sans-serif; }
        .page { min-height: 70vh; padding: 48px 16px 72px; }
        .container { max-width: 760px; margin: 0 auto; }
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 34px; text-align: center; box-shadow: 0 18px 45px rgba(2, 43, 99, .08); }
        .badge { display: inline-flex; align-items: center; padding: 7px 12px; border-radius: 999px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 900; text-transform: uppercase; letter-spacing: .8px; }
        h1 { margin: 18px 0 10px; color: #022B63; font-size: 30px; line-height: 1.25; }
        .edom-name { margin: 0 0 14px; color: #1e1b7a; font-weight: 800; }
        .message { margin: 0; color: #64748b; font-size: 16px; line-height: 1.75; }
        .button { display: inline-flex; align-items: center; justify-content: center; margin-top: 24px; min-height: 42px; padding: 10px 16px; border-radius: 12px; background: #022B63; color: #fff; font-size: 14px; font-weight: 800; text-decoration: none; }
    </style>
</head>
<body>
    @include('component.header')

    <main class="page">
        <div class="container">
            <section class="card">
                <span class="badge">{{ strtoupper($edom->status ?? '-') }}</span>
                <h1>{{ $statusTitle }}</h1>
                <p class="edom-name">{{ $edom->nama_edom }}</p>
                <p class="message">{{ $statusMessage }}</p>
                <a class="button" href="{{ route('edom.home') }}">Kembali ke Halaman EDOM</a>
            </section>
        </div>
    </main>

    @include('component.footer')
</body>
</html>
