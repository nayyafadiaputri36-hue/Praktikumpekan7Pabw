
@extends('layouts.app')

@section('title', 'Daftar Laporan | LaporBanjir')

@section('content')

<style>
.report-action {
    display: flex;
    flex-wrap: wrap;
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
    line-height: 1.5;
}

.report-photo {
    width: 100%;
    height: 190px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
}

.status {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
}

.status-menunggu {
    background: #fef3c7;
    color: #92400e;
}

.status-diproses {
    background: #dbeafe;
    color: #1d4ed8;
}

.status-selesai {
    background: #dcfce7;
    color: #166534;
}

.delete-form {
    display: inline;
}

.pagination {
    margin-top: 25px;
}

@media (max-width: 600px) {
    .report-action {
        flex-direction: column;
    }

    .report-action a,
    .report-action button {
        text-align: center;
    }
}
</style>

<div class="page-heading">
    <span class="eyebrow">INFORMASI LAPORAN</span>
    <h1>Daftar Laporan Banjir</h1>
    <p>Data laporan tersimpan di database LaporBanjir.</p>
</div>

<div class="list-toolbar">
    <div>
        <strong>{{ $laporan->total() }} laporan</strong>
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

                @if ($item->foto)
                    <img
                        src="{{ asset('storage/' . $item->foto) }}"
                        alt="Foto bukti banjir"
                        class="report-photo">
                @else
                    <p>Foto bukti belum tersedia.</p>
                @endif

                <h3>
                    Laporan LB-{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}
                </h3>

                <p>
                    <strong>Nama Pelapor:</strong>
                    {{ $item->nama_pelapor }}
                </p>

                <p>
                    <strong>Nomor HP:</strong>
                    {{ $item->no_hp ?? '-' }}
                </p>

                <p>
                    <strong>Lokasi:</strong>
                    {{ $item->lokasi }}
                </p>

                <p>
                    <strong>Kecamatan:</strong>
                    {{ $item->kecamatan ?? '-' }}
                </p>

                <p>
                    <strong>Tanggal:</strong>
                    {{ $item->tanggal_kejadian
                        ? $item->tanggal_kejadian->format('d-m-Y')
                        : '-' }}
                </p>

                <p>
                    <strong>Tinggi Air:</strong>
                    {{ $item->tinggi_air }} cm
                </p>

                <p>
                    <strong>Keterangan:</strong>
                    {{ $item->keterangan ?? '-' }}
                </p>

                <p>
                    <strong>Status Penanganan:</strong>

                    @if ($item->status == 'Menunggu')
                        <span class="status status-menunggu">
                            Menunggu
                        </span>
                    @elseif ($item->status == 'Diproses')
                        <span class="status status-diproses">
                            Diproses
                        </span>
                    @else
                        <span class="status status-selesai">
                            Selesai
                        </span>
                    @endif
                </p>

                <div class="report-action">

                    <a href="{{ route('laporan.edit', $item->id) }}"
                       class="btn-edit">
                        Edit
                    </a>

                    <form
                        action="{{ route('laporan.destroy', $item->id) }}"
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

    <div class="pagination">
        {{ $laporan->links() }}
    </div>

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
