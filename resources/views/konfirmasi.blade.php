
@extends('layouts.app')

@section('title', 'Konfirmasi Laporan | LaporBanjir')

@section('content')

<div class="confirmation-wrap">

    @if ($laporan)

        <section class="confirmation-panel">
            <div class="confirmation-icon">✓</div>

            <span class="eyebrow">PENGIRIMAN BERHASIL</span>
            <h1>Laporan Berhasil Disimpan!</h1>

            <p class="confirmation-lead">
                Data laporan berhasil disimpan ke database LaporBanjir.
            </p>

            <div class="confirmation-code">
                <small>Kode laporan</small>
                <strong>
                    LB-{{ str_pad($laporan->id, 5, '0', STR_PAD_LEFT) }}
                </strong>
            </div>

            <div class="confirmation-details">
                <h2>Ringkasan Laporan</h2>

                <div class="detail-row">
                    <span>Nama Pelapor</span>
                    <strong>{{ $laporan->nama_pelapor }}</strong>
                </div>

                <div class="detail-row">
                    <span>Lokasi Kejadian</span>
                    <strong>{{ $laporan->lokasi }}</strong>
                </div>

                <div class="detail-row">
                    <span>Tanggal Kejadian</span>
                    <strong>{{ $laporan->tanggal_kejadian->format('d-m-Y') }}</strong>
                </div>

                <div class="detail-row">
                    <span>Tinggi Genangan</span>
                    <strong>{{ $laporan->tinggi_genangan }} cm</strong>
                </div>

                <div class="detail-row">
                    <span>Status Simulasi</span>
                    <strong>
                        @if ($laporan->tinggi_genangan < 30)
                            Waspada
                        @elseif ($laporan->tinggi_genangan <= 70)
                            Siaga
                        @else
                            Awas
                        @endif
                    </strong>
                </div>

                <div class="detail-row detail-description">
                    <span>Keterangan</span>
                    <p>{{ $laporan->keterangan ?? '-' }}</p>
                </div>
            </div>

            <div class="confirmation-notice">
                <strong>Informasi</strong>
                <p>
                    Data sudah masuk ke database. Halaman ini merupakan
                    konfirmasi sistem praktikum, bukan bukti bahwa petugas
                    BPBD telah menerima atau menindaklanjuti laporan.
                </p>
            </div>

            <div class="confirmation-actions">
                <a href="{{ route('laporan.index') }}" class="btn btn-primary">
                    Lihat Daftar Laporan
                </a>

                <a href="{{ route('lapor') }}" class="btn btn-secondary">
                    Buat Laporan Baru
                </a>
            </div>
        </section>

    @else

        <section class="empty-state">
            <div class="empty-icon">📋</div>
            <h2>Belum Ada Konfirmasi</h2>
            <p>Silakan isi formulir untuk membuat laporan baru.</p>
            <a href="{{ route('lapor') }}" class="btn btn-primary">
                Isi Formulir
            </a>
        </section>

    @endif

</div>

@endsection
