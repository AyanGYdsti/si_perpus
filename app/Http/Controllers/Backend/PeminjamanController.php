<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $title = "Peminjaman Buku";

        $peminjaman = Peminjaman::with('anggota', 'buku')->get();

        $anggota = Anggota::get();
        $buku = Buku::get();

        return view('backend.peminjaman.index', compact('title', 'peminjaman', 'anggota', 'buku'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $dataReq = $request->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        Peminjaman::create($dataReq);

        return back()->with('success', 'Berhasil Menambahkan Peminjaman');
    }

    public function delete($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();
        return back()->with('success', 'Berhasil Menghapus Peminjaman');
    }

    public function update(Request $request, $id)
    {
        $dataReq = $request->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        $peminjaman = Peminjaman::find($id);

        $peminjaman->update($dataReq);

        return back()->with('success', 'Berhasil Mengupdate Peminjaman');
    }
}
