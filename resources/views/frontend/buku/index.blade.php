@extends('layouts.main_frontend')

@section('content')
    <form class="d-flex my-3">
        <input id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <div class="row" id="book-list">
        @foreach ($buku as $value)
            <div class="col-3 mb-2">
                <div class="card" style="width: 100%;">
                    <img src="storage/buku/{{ $value->thumbnail }}" class="card-img-top" alt="gambar"
                        style="width: 100%; height:300px">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td style="font-weight: bold">Judul Buku</td>
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
                                <td style="font-weight: bold">JUMLAH BUKU</td>
                                <td>:</td>
                                <td>{{ $value->jml_buku }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Listen for typing in the search input field
            $('#search').on('keyup', function() {
                var query = $(this).val();

                // Perform the AJAX request to search
                $.ajax({
                    url: "/buku/search", // The search route
                    type: "GET",
                    data: {
                        'query': query
                    },
                    success: function(data) {
                        // Replace the #book-list content with the returned view
                        $('#book-list').html(data);
                    }
                });
            });
        });
    </script>
@endpush