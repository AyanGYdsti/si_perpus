@extends('layouts.main_frontend')

@section('content')
    <div class="row">
        @foreach ($buku as $value)
            <div class="col-3 mb-2">
                <div class="card" style="width: 100%;">
                    <img src="storage/buku/{{ $value->thumbnail }}" class="card-img-top" alt="gambar"
                        style="width: 100%; height:300px">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td style="font-weight: bold">Judu Buku</td>
                                <td>:</td>
                                <td>{{ $value->judul }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Tahun Terbit</td>
                                <td>:</td>
                                <td>{{ $value->tahun_terbit }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">ISBN</td>
                                <td>:</td>
                                <td>{{ $value->isbn }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
