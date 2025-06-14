@extends('layout.main')

@section('title')
    Buku
@endsection

@section('breadcrumbs')
    Data Buku
@endsection

@section('judul')
    Data Buku
@endsection

@section('isi')
    <div class="container-fluid py-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Detail Buku</h6>
                </div>

                @if ($message = Session::get('info'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-body bg-white shadow border-radius-lg p-3">
                                {{-- <a href="javascript:;"> --}}
                                <div class="position-relative">
                                    <a class="d-block blur-shadow-image">
                                        <center>
                                            <img src="{{ asset('storage/gambar/' . $buku->gambar) }}"alt="Card image cap"
                                                class="img-fluid shadow border-radius-lg">
                                    </a>
                                </div>
                                <br>
                                <h5>
                                    <center>{{ $buku->nama_buku }}</center>
                                </h5>
                                </center>
                                <div class="card-body">
                                    <p class="card-text">Kode Buku : {{ $buku->kode_buku }}</p>
                                    <p class="card-text">Kategori : {{ $buku->kategori->nama_kategori }}</p>
                                    <p class="card-text">Pengarang / Penerbit: {{ $buku->pengarang }}</p>
                                    <p class="card-text">Tahun Terbit : {{ $buku->tahun_terbit }}</p>
                                    <p class="card-text">Deskripsi / Sinopsis : <br>
                                        {{ $buku->deskripsi }}</p>
                                    <p
                                        class="badge badge-pill {{ $buku->status == 'in stock' ? 'bg-gradient-primary' : 'bg-gradient-danger' }}">
                                        Status: {{ $buku->status }}</p>
                                    <br>
                                    <a href="{{ url('buku') }}" class="btn btn-sm btn-success">Back</a>
                                    <a href="{{ url('buku/ubah', $buku->id) }}" class="btn btn-sm btn-warning"> Edit</a>
                                    {{-- <a href="{{ url('buku/hapus', $buku->id) }}" class="btn btn-sm btn-danger"> Delete</a> --}}
                                    {{-- <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal{{ $buku->id }}">
                                        Delete
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
