
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

.edit-group small {
    display: block;
    color: #8195a5;
    margin-top: 7px;
}

.error-message {
    color: #dc2626;
    font-size: 12px;
    display: block;
    margin-top: 6px;
}

.current-photo {
    width: 100%;
    max-width: 300px;
    height: 190px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 12px;
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

@media(max-width:600px) {
    .edit-actions {
        flex-direction: column;
    }

    .edit-actions a,
    .edit-actions button {
        text-align: center;
    }
}
</style>

<div class="edit-page">

    <div class="edit-card">

        <h1>Edit Laporan Banjir</h1>
        <p>Silakan perbarui informasi laporan kejadian banjir.</p>

        @if ($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;margin-bottom:20px;">
                <strong>Periksa kembali data Anda.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('laporan.update', $laporan->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="edit-group">
                <label>Nama Pelapor *</label>
                <input type="text"
                       name="nama_pelapor"
                       value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}"
                       maxlength="100"
                       required>
                @error('nama_pelapor')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Nomor HP *</label>
                <input type="tel"
                       name="no_hp"
                       value="{{ old('no_hp', $laporan->no_hp) }}"
                       maxlength="20"
                       required>
                @error('no_hp')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Lokasi Kejadian *</label>
                <input type="text"
                       name="lokasi"
                       value="{{ old('lokasi', $laporan->lokasi) }}"
                       maxlength="150"
                       required>
                @error('lokasi')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Kecamatan *</label>
                <select name="kecamatan" required>
                    <option value="">Pilih kecamatan</option>

                    @foreach ([
                        'Dayeuhkolot',
                        'Baleendah',
                        'Bojongsoang',
                        'Rancaekek',
                        'Majalaya',
                        'Cileunyi',
                        'Banjaran',
                        'Pameungpeuk',
                        'Katapang',
                        'Margahayu'
                    ] as $kecamatan)

                        <option value="{{ $kecamatan }}"
                            @selected(old('kecamatan', $laporan->kecamatan) == $kecamatan)>
                            {{ $kecamatan }}
                        </option>

                    @endforeach
                </select>
                @error('kecamatan')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Tanggal Kejadian *</label>
                <input type="date"
                       name="tanggal_kejadian"
                       value="{{ old('tanggal_kejadian', $laporan->tanggal_kejadian ? $laporan->tanggal_kejadian->format('Y-m-d') : '') }}"
                       required>
                @error('tanggal_kejadian')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Tinggi Air (cm) *</label>
                <input type="number"
                       name="tinggi_air"
                       value="{{ old('tinggi_air', $laporan->tinggi_air) }}"
                       min="1"
                       required>
                @error('tinggi_air')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Keterangan Kejadian *</label>
                <textarea name="keterangan"
                          rows="4"
                          maxlength="500"
                          required>{{ old('keterangan', $laporan->keterangan) }}</textarea>
                @error('keterangan')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Status Penanganan *</label>

                <select name="status" required>
                    @foreach (['Menunggu', 'Diproses', 'Selesai'] as $status)
                        <option value="{{ $status }}"
                            @selected(old('status', $laporan->status) == $status)>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>

                @error('status')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-group">
                <label>Foto Bukti Saat Ini</label>

                @if ($laporan->foto)
                    <img
                        src="{{ asset('storage/' . $laporan->foto) }}"
                        alt="Foto bukti banjir"
                        class="current-photo">
                @else
                    <p>Belum ada foto bukti.</p>
                @endif
            </div>

            <div class="edit-group">
                <label>Ganti Foto Bukti</label>

                <input type="file"
                       name="foto"
                       accept=".jpg,.jpeg,.png,image/jpeg,image/png">

                <small>
                    Kosongkan jika tidak ingin mengganti foto.
                    Format JPG, JPEG, PNG maksimal 2 MB.
                </small>

                @error('foto')
                    <span class="error-message">{{ $message }}</span>
                @enderror
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
