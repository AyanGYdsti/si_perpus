@extends('layouts.main_backend')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPeminjaman">
                Data Peminjaman
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Kembali</th>
                    <th>Status Peminjaman</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if ($peminjaman->count() > 0)
                        @foreach ($peminjaman as $value)
                            <tr>
                                <td class=align-middle>{{ $loop->iteration }}</td>
                                <td class=align-middle>{{ $value->anggota->nama }}</td>
                                <td class=align-middle>{{ $value->buku->judul }}</td>
                                <td class=align-middle>{{ $value->tanggal_peminjaman }}</td>
                                <td class=align-middle>{{ $value->tanggal_kembali }}</td>
                                <td class=align-middle>{{ $value->status_peminjaman }}</td>
                                <td class=align-middle>
                                    <div class="d-flex justify-content-center">
                                        <a href="/data-peminjaman/delete/{{ $value->id }}"
                                            class="btn btn-danger mr-2">Hapus</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editPeminjaman{{ $value->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editPeminjaman{{ $value->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Peminjaman
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/data-peminjaman/update/{{ $value->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="id_anggota">Anggota</label>
                                                                        <select name="id_anggota" class="form-control"
                                                                            id="id_anggota">
                                                                            @foreach ($anggota as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ $value->id_anggota === $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="id_buku">Buku</label>
                                                                        <select name="id_buku" class="form-control"
                                                                            id="id_buku">
                                                                            @foreach ($buku as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ $value->id_buku === $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->judul }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="tanggal_peminjaman">Tanggal
                                                                            Peminjaman</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggal_peminjaman"
                                                                            name="tanggal_peminjaman"
                                                                            value="{{ $value->tanggal_peminjaman }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggal_kembali" name="tanggal_kembali"
                                                                            value="{{ $value->tanggal_kembali }}">
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
                            <td colspan="9">Data Tidak Ada</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahPeminjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/data-peminjaman/store" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="id_anggota">Anggota</label>
                                    <select name="id_anggota" class="form-control" id="id_anggota">
                                        @foreach ($anggota as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="id_buku">Buku</label>
                                    <select name="id_buku" class="form-control" id="id_buku">
                                        @foreach ($buku as $item)
                                            <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" id="tanggal_peminjaman"
                                        name="tanggal_peminjaman">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input type="date" class="form-control" id="tanggal_kembali"
                                        name="tanggal_kembali">
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
