@extends('layouts.main_backend')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBuku">
                Data Buku
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <th>No</th>
                    <th>Judul</th>
                    <th>ISBN</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Buku</th>
                    <th>Kategori</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if ($buku->count() > 0)
                        @foreach ($buku as $value)
                            <tr>
                                <td class=align-middle>{{ $loop->iteration }}</td>
                                <td class=align-middle>{{ $value->judul }}</td>
                                <td class=align-middle>{{ $value->isbn }}</td>
                                <td class=align-middle>{{ $value->tahun_terbit }}</td>
                                <td class=align-middle>{{ $value->jml_buku }}</td>
                                <td class=align-middle>{{ $value->kategori }}</td>
                                <td class=align-middle><img src="storage/buku/{{ $value->thumbnail }}" alt="Gambar"
                                        style="width: 100px;height:110px"></td>
                                <td class=align-middle>
                                    <div class="d-flex justify-content-center">
                                        <a href="/data-buku/delete/{{ $value->id }}"
                                            class="btn btn-danger mr-2">Hapus</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editBuku{{ $value->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editBuku{{ $value->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/data-buku/update/{{ $value->id }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="judul">Judul</label>
                                                                        <input type="text" class="form-control"
                                                                            name="judul" id="judul"
                                                                            value="{{ $value->judul }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="isbn">ISBN</label>
                                                                        <input type="text" class="form-control"
                                                                            name="isbn" id="isbn"
                                                                            value="{{ $value->isbn }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="kategori">Kategori</label>
                                                                        <input type="text" class="form-control"
                                                                            name="kategori" id="kategori"
                                                                            value="{{ $value->kategori }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="tahun_terbit">Tahun Terbit</label>
                                                                        <input type="text" class="form-control"
                                                                            name="tahun_terbit" id="tahun_terbit"
                                                                            value="{{ $value->tahun_terbit }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="jml_buku">Jumlah Buku</label>
                                                                        <input type="text" class="form-control"
                                                                            name="jml_buku" id="jml_buku"
                                                                            value="{{ $value->jml_buku }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="thumbnail">Thumbnail</label>
                                                                        <input type="file" class="form-control"
                                                                            name="thumbnail" id="thumbnail">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="6">Data Tidak Ada</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/data-buku/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul"
                                        placeholder="Judul">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" name="isbn" id="isbn"
                                        placeholder="ISBN">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" class="form-control" name="kategori" id="kategori"
                                        placeholder="Kategori">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit"
                                        placeholder="Tahun Terbit">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jml_buku">Jumlah Buku</label>
                                    <input type="text" class="form-control" name="jml_buku" id="jml_buku"
                                        placeholder="Jumlah Buku">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
