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
    public function search(Request $request)
    {
        $title = "Buku";
        // Get the query from the request
        $query = $request->input('query');

        // Perform the search (adjust the fields as per your need)
        $buku = Buku::where('judul', 'LIKE', "%{$query}%")
            ->orWhere('isbn', 'LIKE', "%{$query}%")
            ->orWhere('tahun_terbit', 'LIKE', "%{$query}%")
            ->get();

        return view('frontend.buku.buku_list', compact('title', 'buku'))->render();
    }

}

