@extends('layout.main')

@section('title')
    Tambah Buku
@endsection

@section('breadcrumbs')
    Tambah Buku
@endsection

@section('judul')
    Tambah Buku
@endsection

@section('isi')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-7">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tambah Buku</h6>
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
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('warning'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('buku/simpan') }}">
                                    @csrf
                                    <div class="mb-2 col-10">
                                        <label for="status">Kode Buku</label>
                                        <input type="text" name="kode_buku" id="kode_buku" class="form-control">
                                    </div>

                                    <div class="mb-3 col-10">
                                        <label for="judul buku">Judul Buku</label>
                                        <input type="text" name="nama_buku" id="nama_buku" class="form-control">
                                    </div>

                                    <div class="mb-2 col-10">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori_id" id="kategori_id" class="form-control selection">
                                            <option value=""hidden>--PILIH--</option>
                                            @foreach ($kategori as $kategori)
                                                <option value="{{ $kategori->id }}">
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 col-10">
                                        <label for="pengarang">Pengarang / Penerbit</label>
                                        <input type="text" name="pengarang" id="pengarang" class="form-control">
                                    </div>
                                    <div class="mb-2 col-10">
                                        <label for="tahun_terbit">Tahun Diterbitkan</label>
                                        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control">
                                    </div>

                                    <div class="mb-2 col-10">
                                        <label for="status">Deskripsi / Sinopsis</label>
                                        <textarea type="text" name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                    </div>


                                    <div class="mb-2 col-10">
                                        <label for="gambar">gambar</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control"
                                            onchange="showPreview(event);">
                                    </div>

                                    <a href="{{ url('buku') }}" class="btn btn-sm btn-success">
                                        kembali
                                    </a>
                                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <center>
                            <h6>Image Buku</h6>
                        </center>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="justify-content-end d-flex">
                                        <img id="file-ip-1-preview" width="320px" height="450px">
                                    </div>
                                </div>
                            </div>
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

    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
