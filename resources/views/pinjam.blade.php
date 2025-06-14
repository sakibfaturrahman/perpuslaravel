@extends('template.main')
@section('titleatas')
    E-library
@endsection

@section('content')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ '/book' }}">Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Pinjaman</li>
            </ol>
        </div>
    </section>
    <br>
    <div class="card-body p-2">
    </div>
    <div class="card shadow mb-4">
        <div class="row">
            <div class="card-body">
                <div class="col-3">
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <center>
                                <span><strong> User Information</strong></span>
                            </center>
                            <br><br>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="avatar avatar-xl position-center">
                                        <i class="ni ni-single-02 text-dark text-sm opacity-15"></i>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <div class="h-100">
                                            <h5 class="mb-1">
                                                <b>{{ Auth::user()->name }}
                                            </h5>
                                            <p class="mb-0 font-weight-bold text-sm"> Role :
                                                {{ Auth::user()->role->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <table class="table align-items-center mb-5">
                                    <thead>
                                        <tr>
                                            <th>
                                                Total Pinjaman : {{ $total }}
                                            <th>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="card" style="width: 58rem;">
                    <div class="card-body">
                        <div class="col-md-13">
                            <form method="POST" action="{{ route('userpinjam/simpan') }}">
                                @csrf
                                <label>Pilih Buku</label>
                                <select name="buku_id" id="buku_id" class="select2 form-control">
                                    @foreach ($buku as $buku)
                                        <option value=""hidden>--Select--</option>
                                        <option value="{{ $buku->id }}">
                                            {{ $buku->nama_buku }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <button type="submit" class="btn btn-primary">pinjam</button>
                            </form>
                            <br><br>
                            <div class="row">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-5">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No</th>
                                                    <th>
                                                        Buku yang dipinjam</th>
                                                    <th>
                                                        Tanggal dipinjam</th>
                                                    <th>
                                                        Tanggal Batas Pinjam</th>
                                                    <th>
                                                        Tanggal dikembalikan buku</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pinjam as $p)
                                                    <tr
                                                        class="{{ $p->log_kembali_buku == null ? '' : ($p->log_kembali < $p->log_kembali_buku ? 'bg-danger' : 'bg-success') }}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $p->user->name }}</td> --}}
                                                        <td>{{ $p->buku->nama_buku }}</td>
                                                        <td>{{ $p->log_pinjam }}</td>
                                                        <td>{{ $p->log_kembali }}</td>
                                                        <td>{{ $p->log_kembali_buku }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
