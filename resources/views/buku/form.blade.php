@extends('layout.main')

@section('title')
    Form Pinjam
@endsection

@section('breadcrumbs')
    Form Pinjam
@endsection

@section('judul')
    Form Pinjam
@endsection

@section('isi')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>
                            Borrow a book</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <form method="POST" action="{{ route('pinjam/simpan') }}">
                                    @csrf
                                    <label for="anggota">Anggota yang meminjam</label>
                                    <select name="user_id" id="user_id" class="form-control pilihan">
                                        <option value=""hidden>--Select--</option>
                                        @foreach ($user as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="buku">Buku yang dipinjam</label>
                                    <select name="buku_id" id="buku_id" class="form-control pilihan">
                                        <option value=""hidden>--Select--</option>
                                        @foreach ($buku as $buku)
                                            <option value="{{ $buku->id }}">{{ $buku->kode_buku }}
                                                {{ $buku->nama_buku }} :: {{ $buku->status }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <br>
                                    <button class="btn btn-sm btn-primary" type="submit">Pinjam</button>

                                </form>
                                <div class="justify-content-end d-flex">
                                    <a href="{{ url('data/pinjam') }}" class="btn btn-sm btn-success">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- pijam modal --}}
    {{-- <div class="col-md-4">
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">pinjam</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('pinjam/simpan') }}">
                                        @csrf
                                        <label>Nama Peminjam</label>
                                        <select name="user_id" id="user_id" class=" selection">
                                            <option value=""hidden>--PILIH--</option>
                                            @foreach ($user as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label>Buku yang dipinjam</label>
                                        <select name="buku_id" id="buku_id" class=" selection">
                                            @foreach ($buku as $buku)
                                                <option value=""hidden>--PILIH--</option>
                                                <option value="{{ $buku->id }}">
                                                    {{ $buku->nama_buku }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}





    {{-- @extends('layout.main')

@section('title')
    Pinjam Buku
@endsection

@section('breadcrumbs')
    Pinjam Buku
@endsection

@section('judul')
    Pinjam Buku
@endsection

@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-5">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Anggota</h6>
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="col-12">
                                <form action="" class="search" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Type here...">
                                        <button type="submit" class="form-control"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


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

                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input class="custom-control-input" name="user_id" id="user_id"
                                                        type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}



    {{-- buku --}}
    {{-- <div class="col-7">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Buku</h6>
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="col-7">
                                <form action="" class="search" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nama_buku"
                                            placeholder="Type here...">
                                        <button type="submit" class="form-control"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul Buku</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->nama_buku }}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input class="custom-control-input" name="buku_id" id="buku_id"
                                                        type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-5">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary">Pinjam</button>
                    </div>
                </div>


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
            </div>
        </div> --}}



    {{-- <div class="col-md-4">
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">pinjam</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('pinjam/simpan') }}">
                                        @csrf
                                        <label>Nama Peminjam</label>
                                        <select name="user_id" id="user_id" class="form-control">
                                            @foreach ($user as $user)
                                                <option value=""hidden>--PILIH--</option>
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label>Buku yang dipinjam</label>
                                        <select name="buku_id" id="buku_id" class="form-control">
                                            @foreach ($buku as $buku)
                                                <option value=""hidden>--PILIH--</option>
                                                <option value="{{ $buku->id }}">
                                                    {{ $buku->nama_buku }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selection').select2();
            $('.pilihan').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@endsection
