<?php

namespace App\Http\Controllers;

use App\Models\Kue;
use Illuminate\Http\Request;

class KueController extends Controller
{
    /**
     * Menampilkan daftar kue dengan fitur Pencarian
     */
    public function index(Request $request)
    {
        // 1. Ambil input dari form pencarian
        $search = $request->input('search');

        // 2. Logika Pencarian: Jika ada input search, cari di kolom nama_kue atau deskripsi
        if ($search) {
            $kues = Kue::where('nama_kue', 'LIKE', "%{$search}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$search}%")
                        ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua data
            $kues = Kue::all();
        }

        // 3. Kirim data ke view index
        return view('kue.index', compact('kues'));
    }

    /**
     * Menampilkan form tambah kue
     */
    public function create()
    {
        return view('kue.create');
    }

    /**
     * Menyimpan data kue baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kue' => 'required|string|max:255',
            'harga'    => 'required|numeric|min:0',
            'stok'     => 'required|integer|min:0',
            'deskripsi'=> 'nullable|string',
        ]);

        Kue::create($validated);
        
        return redirect()->route('kue.index')->with('success', 'Kue berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit kue
     */
    public function edit(Kue $kue)
    {
        return view('kue.edit', compact('kue'));
    }

    /**
     * Mengupdate data kue
     */
    public function update(Request $request, Kue $kue)
    {
        $validated = $request->validate([
            'nama_kue' => 'required|string|max:255',
            'harga'    => 'required|numeric|min:0',
            'stok'     => 'required|integer|min:0',
            'deskripsi'=> 'nullable|string',
        ]);

        $kue->update($validated);
        
        return redirect()->route('kue.index')->with('success', 'Kue berhasil diupdate!');
    }

    /**
     * Menghapus data kue
     */
    public function destroy(Kue $kue)
    {
        $kue->delete();
        return redirect()->route('kue.index')->with('success', 'Kue berhasil dihapus!');
    }
}