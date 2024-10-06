<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $title = "Buku";

        $buku = Buku::all();

        return view('frontend.buku.index', compact('title', 'buku'));
    }
}
