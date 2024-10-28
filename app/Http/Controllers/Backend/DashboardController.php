<?php

namespace App\Http\Controllers\Backend;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dasboard";

        $jmlAnggota=Anggota::count();
        $jmlBuku=Buku::count();
        $jmlPeminjaman = Peminjaman::count();


        return view('backend.dashboard.index', compact('title','jmlAnggota','jmlBuku','jmlPeminjaman'));
    }
}
