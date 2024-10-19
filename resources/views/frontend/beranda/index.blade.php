@extends('layouts.main_frontend')

@section('content')
    <div style="height: 80vh;width:100%;background-image:url('assets/img/mipa.jpeg');background-size:cover; background-position:center; "
        class="d-flex justify-content-center align-items-center text-white">
        <div class="d-flex flex-column justify-content-center align-items-center bg-dark p-4"
            style="width: 90%;--bs-bg-opacity: .5;border-radius:10px">
            <h1>SELAMAT DATANG DI PERPUSTAKAAN ONLINE FMIPA UHO</h1>
            <a href="/buku" class="btn text-white " style="background-color: #0053A0;">JELAJAHI BUKU</a>
        </div>
    </div>
    </div>
@endsection
