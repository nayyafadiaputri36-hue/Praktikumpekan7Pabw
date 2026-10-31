
@php
    $statusClass = strtolower($laporan['status']);
@endphp

<article class="report-card">

    <div class="report-card-top">
        <span class="report-code">
            {{ $laporan['kode'] }}
        </span>

        <span class="status-badge status-{{ $statusClass }}">
            {{ $laporan['status'] }}
        </span>
    </div>

    <h3>{{ $laporan['lokasi'] }}</h3>

    <div class="report-meta">
        <span>👤 {{ $laporan['nama'] }}</span>
        <span>📅 {{ $laporan['tanggal'] }}</span>
    </div>

    <div class="water-level">
        <div>
            <small>Tinggi genangan</small>
            <strong>{{ $laporan['tinggi_air'] }} cm</strong>
        </div>
        <span class="water-icon">💧</span>
    </div>

    <div class="report-description">
        <strong>Keterangan</strong>
        <p>{{ $laporan['keterangan'] }}</p>
    </div>

</article>
