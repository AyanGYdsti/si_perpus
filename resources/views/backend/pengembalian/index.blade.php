@extends('layouts.main_backend')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPengembalian">
                Data Pengembalian
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <th>No</th>
                    <th>Peminjaman</th>
                    <th>Tanggal Dikembalikan</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if ($pengembalian->count() > 0)
                        @foreach ($pengembalian as $value)
                            <tr>
                                <td class=align-middle>{{ $loop->iteration }}</td>
                                <td class=align-middle>{{ $value->peminjaman->anggota->nama }}</td>
                                <td class=align-middle>{{ $value->tanggal_dikembalikan }}</td>
                                <td class=align-middle>
                                    <div class="d-flex justify-content-center">
                                        <a href="/data-pengembalian/delete/{{ $value->id }}"
                                            class="btn btn-danger mr-2">Hapus</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editPengembalian{{ $value->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editPengembalian{{ $value->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                            Pengembalian
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/data-pengembalian/update/{{ $value->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="id_peminjaman">Peminjaman</label>
                                                                        <select name="id_peminjaman" class="form-control"
                                                                            id="id_peminjaman">
                                                                            @foreach ($peminjaman as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ $value->id_peminjaman === $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->anggota->nama . '-' . $item->buku->judul . '(' . $item->tanggal_peminjaman . ')' }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="tanggal_dikembalikan">Tanggal
                                                                            Dikembali</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggal_dikembalikan"
                                                                            name="tanggal_dikembalikan"
                                                                            value="{{ $value->tanggal_dikembalikan }}">
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
    <div class="modal fade" id="tambahPengembalian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengembalian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/data-pengembalian/store" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="id_peminjaman">Peminjaman</label>
                                    <select name="id_peminjaman" class="form-control" id="id_peminjaman">
                                        @foreach ($peminjaman as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->anggota->nama . '-' . $item->buku->judul . '(' . $item->tanggal_peminjaman . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tanggal_dikembalikan">Tanggal Dikembali</label>
                                    <input type="date" class="form-control" id="tanggal_dikembalikan"
                                        name="tanggal_dikembalikan">
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
