<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $title = "Peminjaman Buku";

        $pengembalian = Pengembalian::with('peminjaman')->get();

        $peminjaman = Peminjaman::with('anggota', 'buku')->get();

        return view('backend.pengembalian.index', compact('title', 'pengembalian', 'peminjaman'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $dataReq = $request->validate([
            'id_peminjaman' => 'required',
            'tanggal_dikembalikan' => 'required'
        ]);

        $peminjaman = Peminjaman::find($request->id_peminjaman);
        $peminjaman->update([
            'status_peminjaman' => 'Dikembalikan'
        ]);

        Pengembalian::create($dataReq);

        return back()->with('success', 'Berhasil Menambahkan Pengembalian');
    }

    public function delete($id)
    {
        $pengembalian = Pengembalian::find($id);
        $pengembalian->delete();
        return back()->with('success', 'Berhasil Menghapus Pengembalian');
    }

    public function update(Request $request, $id)
    {
        $dataReq = $request->validate([
            'id_peminjaman' => 'required',
            'tanggal_dikembalikan' => 'required',
        ]);

        $peminjaman = Peminjaman::find($request->id_peminjaman);

        $pengembalian = Pengembalian::find($id);

        $pengembalian->update($dataReq);

        return back()->with('success', 'Berhasil Mengupdate Pengembalian');
    }
}
