@extends('layout.main')

@section('title')
    Riwayat Pinjaman
@endsection

@section('breadcrumbs')
    Riwayat Pinjaman
@endsection

@section('judul')
    Riwayat Pinjaman
@endsection

@section('isi')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Riwayat Pinjaman</h6>
                {{-- <p><b>Keterangan :</p>
                <ul>
                    <li>Hijau : mengembalikan dengan tepat waktu</li>
                    <li>Merah : terlambat mengembalikan</li>
                </ul> --}}


                <a href="{{ url('data/pinjam') }}" class="btn btn-success">Kembali</a>
                <a href="{{ url('data/pinjam/export-pdf') }}" class="btn btn-warning"><i class="fa fa-print"></i></a>

            </div>

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
                                    Buku yang dikembalikan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal dipinjam</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal dikembalikan buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjam as $p)
                                {{-- <tr
                                    class="{{ $p->log_kembali_buku == null ? '' : ($p->log_kembali < $p->log_kembali_buku ? 'bg-danger' : 'bg-success') }}"> --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->user->name }}</td>
                                    <td>{{ $p->buku->nama_buku }}</td>
                                    <td>{{ $p->log_pinjam }}</td>
                                    <td>{{ $p->log_kembali_buku }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
