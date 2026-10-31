<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Petugas BPBD</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e8f5e9;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #ccc;
        }

        h2 {
            color: #2e7d32;
            text-align: center;
        }

        p {
            padding: 12px;
            background: #f1f8e9;
            border-radius: 6px;
        }

        a, button {
            display: inline-block;
            padding: 12px 20px;
            background: #2e7d32;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Profil Petugas BPBD</h2>

    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>

    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

    <p><strong>Tanggal Bergabung:</strong>
        {{ Auth::user()->created_at->format('d-m-Y') }}
    </p>

    <a href="{{ route('laporan.index') }}">Kembali ke Laporan</a>

    <form action="{{ route('logout') }}" method="POST" style="margin-top:20px;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>