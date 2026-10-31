
@extends('layouts.app')

@section('title', 'Daftar Laporan | LaporBanjir')

@section('content')

<style>
.report-action {
    display: flex;
    gap: 10px;
    margin-top: 18px;
}

.report-action a,
.report-action button {
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
}

.btn-edit {
    background: #dbeeff;
    color: #2476a8;
}

.btn-delete {
    background: #fee2e2;
    color: #b91c1c;
}

.report-card {
    background: white;
    padding: 22px;
    border-radius: 14px;
    border: 1px solid #dbeafe;
    box-shadow: 0 4px 15px rgba(50, 120, 170, 0.08);
}

.report-card h3 {
    color: #2476a8;
    margin-bottom: 12px;
}

.report-card p {
    margin: 8px 0;
    color: #475569;
}

.delete-form {
    display: inline;
}
</style>

<div class="page-heading">
    <span class="eyebrow">INFORMASI LAPORAN</span>
    <h1>Daftar Laporan Banjir</h1>
    <p>Data laporan tersimpan di database LaporBanjir.</p>
</div>

<div class="list-toolbar">
    <div>
        <strong>{{ $laporan->count() }} laporan</strong>
        <p>Data diambil langsung dari MySQL.</p>
    </div>

    <a href="{{ route('lapor') }}" class="btn btn-primary">
        + Buat Laporan
    </a>
</div>

@if ($laporan->isNotEmpty())

    <section class="reports-grid">

        @foreach ($laporan as $item)

            <div class="report-card">

                <h3>
                    Laporan LB-{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}
                </h3>

                <p><strong>Nama Pelapor:</strong> {{ $item->nama_pelapor }}</p>

                <p><strong>Lokasi:</strong> {{ $item->lokasi }}</p>

                <p><strong>Tanggal:</strong> {{ $item->tanggal_kejadian->format('d-m-Y') }}</p>

                <p><strong>Tinggi Air:</strong> {{ $item->tinggi_genangan }} cm</p>

                <p><strong>Keterangan:</strong> {{ $item->keterangan ?? '-' }}</p>

                <p>
                    <strong>Status:</strong>
                    @if ($item->tinggi_genangan < 30)
                        Waspada
                    @elseif ($item->tinggi_genangan <= 70)
                        Siaga
                    @else
                        Awas
                    @endif
                </p>

                <div class="report-action">

                    <a href="{{ route('laporan.edit', $item->id) }}"
                       class="btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('laporan.destroy', $item->id) }}"
                          method="POST"
                          class="delete-form"
                          onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-delete">
                            Hapus
                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </section>

@else

    <section class="empty-state">
        <div class="empty-icon">📋</div>
        <h2>Belum Ada Laporan</h2>
        <p>Belum ada data laporan di database.</p>

        <a href="{{ route('lapor') }}" class="btn btn-primary">
            Buat Laporan
        </a>
    </section>

@endif

@endsection
