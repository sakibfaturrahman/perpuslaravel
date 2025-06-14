@extends('layout.main')

@section('title')
    Peminjam
@endsection

@section('breadcrumbs')
    Data Peminjam
@endsection

@section('judul')
    Data Peminjam
@endsection

@section('isi')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Peminjam</h6>
                        <a href="{{ url('form-pinjam') }}" class="btn btn-primary">Pinjam Buku</a>
                        <a href="{{ url('form-kembali') }}" class="btn btn-success">Kembalikan Buku</a>
                        <a class="btn btn-danger" href="{{ url('riwayatpinjam') }}">Riwayat peminjaman</a>

                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <form action="" class="search" method="get">
                                <div class="input-group">
                                    <span class="input-group-text text-body"><button type="submit" class="form-control"><i
                                                class="fas fa-search" aria-hidden="true"></i></button></span>
                                    <input type="search" class="form-control" name="search"
                                        placeholder="Cari tanggal ...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('info'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama peminjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Buku yang dipinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal dipinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Batas Pinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Dikembalikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pinjam as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->user->name }}</td>
                                            <td>{{ $p->buku->nama_buku }}</td>
                                            <td>{{ $p->log_pinjam }}</td>
                                            <td>{{ $p->log_kembali }}</td>
                                            <td>{{ $p->log_kembali_buku }}</td>
                                            {{-- <td>
                                                <form method="POST" action="{{ url('bukukembali/' . $p->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning ">Return</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <nav aria-label="Page navigation example">
                {{ $pinjam->links() }}
            </nav> --}}

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selection').select2();
            $('.pilihan').select2();
        });
    </script>
@endsection
