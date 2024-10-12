<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $title = "Kartu Anggota";

        $anggota = Anggota::get();

        return view('backend.anggota.index', compact('title', 'anggota'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $dataReq = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jurusan' => 'required',
            'status' => 'required',
        ]);

        Anggota::create($dataReq);

        return back()->with('success', 'Berhasil Menambahkan Anggota');
    }

    public function delete($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        return back()->with('success', 'Berhasil Menghapus Anggota');
    }

    public function update(Request $request, $id)
    {
        $dataReq = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jurusan' => 'required',
            'status' => 'required',
        ]);

        $anggota = Anggota::find($id);

        $anggota->update($dataReq);

        return back()->with('success', 'Berhasil Mengupdate Anggota');
    }
}
