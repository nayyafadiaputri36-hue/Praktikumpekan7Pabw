<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporBanjirController extends Controller
{
    // Halaman utama
    public function home()
    {
        return view('home');
    }

    // Form laporan warga
    public function create()
    {
        return view('lapor');
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'lokasi' => 'required|string|max:150',
            'kecamatan' => 'required|string|max:100',
            'tinggi_air' => 'required|integer|min:1',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'required|string|max:500',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.required' => 'Foto bukti wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $validated['foto'] = $request->file('foto')
            ->store('foto-laporan', 'public');

        $validated['status'] = 'Menunggu';

        Laporan::create($validated);

        return redirect()
            ->route('konfirmasi')
            ->with('success', 'Laporan berhasil dikirim.');
    }

    // Menampilkan daftar laporan
   public function index()
{
    $laporan = Laporan::latest()->paginate(6);

    return view('laporan', compact('laporan'));
}

    // Menampilkan detail laporan
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('detail-laporan', compact('laporan'));
    }

    // Menampilkan halaman edit
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('edit-laporan', compact('laporan'));
    }

    // Memperbarui laporan
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'lokasi' => 'required|string|max:150',
            'kecamatan' => 'required|string|max:100',
            'tinggi_air' => 'required|integer|min:1',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'required|string|max:500',
            'status' => 'required|in:Menunggu,Diproses,Selesai',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        unset($validated['foto']);

        if ($request->hasFile('foto')) {
            $fotoLama = $laporan->foto;

            $fotoBaru = $request->file('foto')
                ->store('foto-laporan', 'public');

            $validated['foto'] = $fotoBaru;

            if ($fotoLama) {
                Storage::disk('public')->delete($fotoLama);
            }
        }

        $laporan->update($validated);

        return redirect()
            ->route('laporan.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus laporan beserta fotonya
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return redirect()
            ->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }

    // Halaman konfirmasi
    public function konfirmasi()
    {
        return view('konfirmasi');
    }
}
