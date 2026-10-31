
@extends('layouts.app')

@section('title', 'Edit Laporan Banjir')

@section('content')

<style>
.edit-page {
    max-width: 750px;
    margin: 40px auto;
    padding: 20px;
}

.edit-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 5px 25px rgba(50, 120, 170, 0.12);
}

.edit-card h1 {
    color: #2476a8;
    margin-bottom: 8px;
}

.edit-card p {
    color: #64748b;
    margin-bottom: 25px;
}

.edit-group {
    margin-bottom: 18px;
}

.edit-group label {
    display: block;
    font-weight: 600;
    color: #334155;
    margin-bottom: 8px;
}

.edit-group input,
.edit-group select,
.edit-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #cbddec;
    border-radius: 9px;
    box-sizing: border-box;
    font-size: 14px;
}

.edit-group input:focus,
.edit-group select:focus,
.edit-group textarea:focus {
    outline: none;
    border-color: #4299d5;
}

.edit-actions {
    display: flex;
    gap: 12px;
    margin-top: 25px;
}

.edit-btn {
    background: #318ac1;
    color: white;
    border: none;
    padding: 12px 22px;
    border-radius: 9px;
    cursor: pointer;
    text-decoration: none;
}

.back-btn {
    background: #e5f2fb;
    color: #2476a8;
    padding: 12px 22px;
    border-radius: 9px;
    text-decoration: none;
}
</style>

<div class="edit-page">

    <div class="edit-card">

        <h1>Edit Laporan Banjir</h1>
        <p>Silakan perbarui informasi laporan kejadian banjir.</p>

        @if ($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;margin-bottom:20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('laporan.update', $laporan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="edit-group">
                <label>Nama Pelapor</label>
                <input type="text" name="nama"
                    value="{{ old('nama', $laporan->nama_pelapor) }}" required>
            </div>

            <div class="edit-group">
                <label>Lokasi Kejadian</label>
                <input type="text" name="lokasi"
                    value="{{ old('lokasi', $laporan->lokasi) }}" required>
            </div>

            <div class="edit-group">
                <label>Tanggal Kejadian</label>
                <input type="date" name="tanggal_kejadian"
                    value="{{ old('tanggal_kejadian', $laporan->tanggal_kejadian->format('Y-m-d')) }}"
                    required>
            </div>

            <div class="edit-group">
                <label>Tinggi Genangan Air (cm)</label>
                <input type="number" name="tinggi_air"
                    value="{{ old('tinggi_air', $laporan->tinggi_genangan) }}"
                    min="1" required>
            </div>

            <div class="edit-group">
                <label>Keterangan Kejadian</label>
                <textarea name="keterangan" rows="4" required>{{ old('keterangan', $laporan->keterangan) }}</textarea>
            </div>

            <div class="edit-actions">
                <a href="{{ route('laporan.index') }}" class="back-btn">
                    Kembali
                </a>

                <button type="submit" class="edit-btn">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
