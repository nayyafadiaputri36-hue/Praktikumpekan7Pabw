
@extends('layouts.app')

@section('title', 'Beranda | LaporBanjir')

@section('content')

<section class="hero-section">
    <div class="hero-content">
        <span class="hero-badge">🌿 Pelayanan Informasi Banjir</span>

        <h1>Laporkan Banjir,<br>
            <span>Bantu Sesama.</span>
        </h1>

        <p>
            Sampaikan informasi kejadian banjir di sekitar Anda
            agar kondisi wilayah dapat diketahui dengan lebih cepat.
        </p>

        <div class="hero-actions">
            <a href="{{ route('lapor') }}" class="btn btn-primary">
                Buat Laporan <span>→</span>
            </a>

            <a href="{{ route('laporan.index') }}" class="btn btn-outline">
                Lihat Daftar Laporan
            </a>
        </div>

        <div class="hero-note">
            <span class="note-dot"></span>
            Prototype pelaporan banjir tanpa database
        </div>
    </div>

    <div class="hero-visual">
        <div class="visual-circle">
            <span class="visual-water">🌊</span>
        </div>
        <div class="floating-card floating-top">
            <span>📍</span>
            <div>
                <strong>Informasi Lokasi</strong>
                <small>Wilayah terdampak</small>
            </div>
        </div>
        <div class="floating-card floating-bottom">
            <span>✓</span>
            <div>
                <strong>Pelaporan Mudah</strong>
                <small>Isi formulir secara online</small>
            </div>
        </div>
    </div>
</section>

<section class="section-heading">
    <span class="eyebrow">MUDAH DAN PRAKTIS</span>
    <h2>Bagaimana cara melapor?</h2>
    <p>Ikuti tiga langkah sederhana berikut untuk membuat laporan.</p>
</section>

<section class="steps-grid">
    <article class="step-card">
        <div class="step-number">01</div>
        <div class="step-icon">📝</div>
        <h3>Isi Formulir</h3>
        <p>Masukkan nama, lokasi kejadian, tinggi air, dan keterangan.</p>
    </article>

    <article class="step-card">
        <div class="step-number">02</div>
        <div class="step-icon">📤</div>
        <h3>Kirim Laporan</h3>
        <p>Periksa kembali data, lalu kirim formulir laporan Anda.</p>
    </article>

    <article class="step-card">
        <div class="step-number">03</div>
        <div class="step-icon">📋</div>
        <h3>Lihat Hasil</h3>
        <p>Lihat konfirmasi dan periksa laporan pada halaman daftar.</p>
    </article>
</section>

<section class="callout">
    <div>
        <span class="eyebrow">MULAI SEKARANG</span>
        <h2>Mengetahui kondisi sekitar dimulai dari sebuah laporan.</h2>
        <p>Gunakan formulir sederhana untuk mencatat kejadian banjir.</p>
    </div>

    <a href="{{ route('lapor') }}" class="btn btn-light">
        Buat Laporan <span>→</span>
    </a>
</section>

@endsection
