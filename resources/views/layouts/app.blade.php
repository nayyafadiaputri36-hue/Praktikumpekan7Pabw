
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'LaporBanjir | BPBD Kabupaten Bandung')</title>

    <meta name="description"
          content="Prototype sistem pelaporan banjir Kabupaten Bandung">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="site-header">
        <div class="nav-container">

            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">🌊</span>
                <span>
                    <strong>LaporBanjir</strong>
                    <small>BPBD Kabupaten Bandung</small>
                </span>
            </a>

            <nav class="main-nav">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>

                <a href="{{ route('lapor') }}"
                   class="{{ request()->routeIs('lapor') ? 'active' : '' }}">
                    Buat Laporan
                </a>

                <a href="{{ route('laporan.index') }}"
                   class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                    Daftar Laporan
                </a>
            </nav>

        </div>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <strong>LaporBanjir</strong>
            <p>
                Prototype pelaporan banjir BPBD Kabupaten Bandung.
            </p>
            <small>
                &copy; {{ date('Y') }} — Dibuat untuk praktikum Laravel.
            </small>
        </div>
    </footer>

</body>
</html>
