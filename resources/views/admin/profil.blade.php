@extends('layout.main')

@section('title')
    Profil
@endsection

@section('breadcrumbs')
    Profil
@endsection

@section('judul')
    Profil
@endsection


@section('isi')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <b>{{ $user->name }}

                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $user->role->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card-body p-4">
            <div class="row gx-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <span>Jumlah buku yang pernah dipinjam : {{ $jumlah }} Buku</span>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Username</label>
                                    <input name="name" id="name" value="{{ $user->name }}" class="form-control"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    <input class="form-control" type="text" name="username" id="username"
                                        value="{{ $user->username }}">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Contact Information</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Phone</label>
                                    <input class="form-control" type="text" name="phone" id="phone"
                                        value="{{ $user->phone }}">
                                </div>
                                <a href="{{ url('user') }}" class="btn btn-success"> Kembali</a>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Addres</label>
                                    <input class="form-control" type="text" name="alamat" id="alamat"
                                        value="{{ $user->alamat }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container-fluid py-5">
            <div class="row gx-4">
                <div class="card">
                    <div class="card-body">
                        <span>Total Transaksi Pinjam : {{ $jumlah }}</span>
                        <br><br>
                        <span>Riwayat Pinjaman {{ $user->name }}:</span>
                        <div class="row">
                            <table class="table align-items-center mb-5">
                                <thead>
                                    <tr>
                                        <th>
                                            No</th>
                                        <th>
                                            Buku yang pernah dipinjam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->buku->nama_buku }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
