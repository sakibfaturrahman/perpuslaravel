@extends('layout.main')

@section('title')
    Detail Peminjam
@endsection

@section('breadcrumbs')
    Detail Data Peminjam
@endsection

@section('judul')
    Detail Data Peminjam
@endsection

@section('isi')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Detail Data Peminjam</h6>
                        <a href="{{ url('data/pinjam') }}" class="btn btn-success">Kembali</a>
                    </div>
                    <br>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama peminjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Buku yang dipinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal dipinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Batas Pinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kembalikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $log->user->name }}</td>
                                        <td>{{ $log->buku->nama_buku }}</td>
                                        <td>{{ $log->log_pinjam }}</td>
                                        <td>{{ $log->log_kembali }}</td>
                                        <td>
                                            <form method="POST" action="{{ url('bukukembali/' . $log->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-warning ">kembali</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
