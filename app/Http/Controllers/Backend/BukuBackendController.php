<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuBackendController extends Controller
{
    public function index()
    {
        $title = 'Data Buku';
        $buku = Buku::all();

        return view('backend.buku.index', compact('title', 'buku'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $dataReq = $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'kategori' => 'required',
            'tahun_terbit' => 'required',
            'jml_buku' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $filename = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('/public/buku', $filename);
            $dataReq['thumbnail'] = $filename;
        }

        Buku::create($dataReq);

        return back()->with('success', 'Berhasil Menambahkan data');
    }

    public function delete($id)
    {
        $buku = Buku::find($id);
        unlink(storage_path('app/public/buku/' . $buku['thumbnail']));
        $buku->delete();
        return back()->with('success', 'Berhasil Menghapus data');
    }

    public function update(Request $request, $id)
    {
        $dataReq = $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'kategori' => 'required',
            'tahun_terbit' => 'required',
            'jml_buku' => 'required',
        ]);

        $buku = Buku::find($id);

        if ($request->thumbnail) {
            unlink(storage_path('app/public/buku/' . $buku['thumbnail']));
            $filename = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('/public/buku', $filename);
            $dataReq['thumbnail'] = $filename;
        }

        $buku->update($dataReq);

        return back()->with('success', 'Berhasil Mengupdate data');
    }
}
