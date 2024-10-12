@extends('layouts.main_backend')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAnggota">
                Data Anggota
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if ($anggota->count() > 0)
                        @foreach ($anggota as $value)
                            <tr>
                                <td class=align-middle>{{ $loop->iteration }}</td>
                                <td class=align-middle>{{ $value->nama }}</td>
                                <td class=align-middle>{{ $value->nim }}</td>
                                <td class=align-middle>{{ $value->alamat }}</td>
                                <td class=align-middle>{{ $value->email }}</td>
                                <td class=align-middle>{{ $value->no_telp }}</td>
                                <td class=align-middle>{{ $value->jurusan }}</td>
                                <td class=align-middle>{{ $value->status }}</td>
                                <td class=align-middle>
                                    <div class="d-flex justify-content-center">
                                        <a href="/data-anggota/delete/{{ $value->id }}"
                                            class="btn btn-danger mr-2">Hapus</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editAnggota{{ $value->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editAnggota{{ $value->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/data-anggota/update/{{ $value->id }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="nama">Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama"
                                                                            value="{{ $value->nama }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="nim">NIM</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nim" name="nim"
                                                                            value="{{ $value->nim }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <input type="text" class="form-control"
                                                                            id="alamat" name="alamat"
                                                                            value="{{ $value->alamat }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email" name="email"
                                                                            value="{{ $value->email }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="no_telp">No Telp</label>
                                                                        <input type="text" class="form-control"
                                                                            id="no_telp" name="no_telp"
                                                                            value="{{ $value->no_telp }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="jurusan">Jurusan</label>
                                                                        <input type="text" class="form-control"
                                                                            id="jurusan" name="jurusan"
                                                                            value="{{ $value->jurusan }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" class="form-control"
                                                                            id="status">
                                                                            <option value="Aktif"
                                                                                {{ $value->status === 'Aktif' ? 'selected' : '' }}>
                                                                                Aktif</option>
                                                                            <option value="Tidak Aktif"
                                                                                {{ $value->status === 'Tidak Aktif' ? 'selected' : '' }}>
                                                                                Tidak Aktif</option>
                                                                        </select>
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
    <div class="modal fade" id="tambahAnggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/data-anggota/store" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        placeholder="NIM">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="No Telp">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan"
                                        placeholder="Jurusan">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
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
