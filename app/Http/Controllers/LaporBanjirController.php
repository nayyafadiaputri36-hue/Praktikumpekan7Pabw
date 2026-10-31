<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function create()
    {
        return view('lapor');
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi_air' => 'required|integer|min:1',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'required|string|max:500',
        ]);

        Laporan::create([
            'nama_pelapor' => $validated['nama'],
            'lokasi' => $validated['lokasi'],
            'tinggi_genangan' => $validated['tinggi_air'],
            'tanggal_kejadian' => $validated['tanggal_kejadian'],
            'keterangan' => $validated['keterangan'],
        ]);

        return redirect()
            ->route('konfirmasi')
            ->with('success', 'Laporan berhasil dikirim.');
    }

    // Menampilkan daftar laporan
    public function index()
    {
        $laporan = Laporan::latest()->get();

        return view('laporan', compact('laporan'));
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
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi_air' => 'required|integer|min:1',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'required|string|max:500',
        ]);

        $laporan = Laporan::findOrFail($id);

        $laporan->update([
            'nama_pelapor' => $validated['nama'],
            'lokasi' => $validated['lokasi'],
            'tinggi_genangan' => $validated['tinggi_air'],
            'tanggal_kejadian' => $validated['tanggal_kejadian'],
            'keterangan' => $validated['keterangan'],
        ]);

        return redirect()
            ->route('laporan.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus laporan
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
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