
@extends('layouts.app')

@section('title', 'Buat Laporan Banjir')

@section('content')

<style>
    .form-page {
        background: #eaf6ff;
        min-height: 100vh;
        padding: 45px 20px;
        border-radius: 16px;
    }

    .form-heading {
        max-width: 800px;
        margin: 0 auto 25px;
        text-align: center;
    }

    .form-heading .eyebrow {
        color: #368bc5;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    .form-heading h1 {
        color: #16466a;
        font-size: 32px;
        margin: 12px 0;
    }

    .form-heading p {
        color: #617b91;
        line-height: 1.7;
    }

    .form-card {
        max-width: 750px;
        margin: auto;
        padding: 35px;
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(48, 126, 180, 0.12);
        border: 1px solid #d8edfc;
    }

    .form-card-heading {
        border-bottom: 1px solid #e2eff8;
        padding-bottom: 18px;
        margin-bottom: 25px;
    }

    .form-card-heading h2 {
        color: #16466a;
        font-size: 21px;
        margin: 0 0 8px;
    }

    .form-card-heading p {
        color: #8195a5;
        font-size: 13px;
        margin: 0;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        color: #294f6b;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 9px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #cfe4f3;
        border-radius: 9px;
        background: #f8fcff;
        color: #29465d;
        font-size: 14px;
        outline: none;
        box-sizing: border-box;
        transition: 0.2s;
        font-family: inherit;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #4299d5;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(66, 153, 213, 0.12);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 110px;
    }

    .form-group small {
        display: block;
        color: #8195a5;
        margin-top: 7px;
        font-size: 12px;
    }

    .alert-error {
        background: #fff1f1;
        border: 1px solid #ffcaca;
        color: #b42318;
        padding: 15px;
        border-radius: 9px;
        margin-bottom: 22px;
    }

    .alert-error ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        border-top: 1px solid #e2eff8;
        padding-top: 23px;
        margin-top: 28px;
    }

    .form-actions .btn {
        padding: 13px 25px;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: none;
        transition: 0.2s;
    }

    .btn-primary {
        background: #4299d5;
        color: white;
    }

    .btn-primary:hover {
        background: #287eb9;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #eaf4fb;
        color: #39769e;
    }

    .btn-secondary:hover {
        background: #d8ebf8;
    }

    @media (max-width: 600px) {
        .form-page {
            padding: 25px 12px;
        }

        .form-card {
            padding: 22px 18px;
        }

        .form-heading h1 {
            font-size: 25px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions .btn {
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }
    }
</style>

<div class="form-page">

    <div class="form-heading">
        <span class="eyebrow">LAPORBANJIR • PELAPORAN WARGA</span>

        <h1>Buat Laporan Banjir</h1>

        <p>
            Laporkan kejadian banjir di sekitar Anda agar informasi
            dapat tercatat dan segera ditindaklanjuti.
        </p>
    </div>

    <div class="form-card">

        <div class="form-card-heading">
            <h2>Informasi Kejadian</h2>
            <p>Silakan isi informasi kejadian banjir dengan lengkap.</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Periksa kembali data Anda.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lapor.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Pelapor *</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi Kejadian *</label>
                <select id="lokasi" name="lokasi" required>
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
                    ] as $lokasi)

                        <option value="{{ $lokasi }}"
                            @selected(old('lokasi') === $lokasi)>
                            {{ $lokasi }}
                        </option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_kejadian">Tanggal Kejadian *</label>
                <input
                    type="date"
                    id="tanggal_kejadian"
                    name="tanggal_kejadian"
                    value="{{ old('tanggal_kejadian', date('Y-m-d')) }}"
                    max="{{ date('Y-m-d') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tinggi_air">Tinggi Genangan Air (cm) *</label>
                <input
                    type="number"
                    id="tinggi_air"
                    name="tinggi_air"
                    value="{{ old('tinggi_air') }}"
                    placeholder="Contoh: 45"
                    min="1"
                    required
                >
                <small>Masukkan perkiraan tinggi air dalam sentimeter.</small>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan Kejadian *</label>
                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="4"
                    maxlength="500"
                    placeholder="Jelaskan kondisi banjir dan situasi di lokasi..."
                    required
                >{{ old('keterangan') }}</textarea>
            </div>

            <div class="form-actions">

                <a href="{{ route('home') }}" class="btn btn-secondary">
                    ← Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Kirim Laporan →
                </button>

            </div>
        </form>

    </div>
</div>

@endsection
