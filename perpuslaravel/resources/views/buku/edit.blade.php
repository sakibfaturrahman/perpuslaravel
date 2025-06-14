@extends('layout.main')

@section('title')
    Edit Buku
@endsection

@section('breadcrumbs')
    Edit Buku
@endsection

@section('judul')
    Edit Buku
@endsection

@section('isi')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-7">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Edit Buku</h6>
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
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ url('buku/update/' . $buku->id) }}">
                                    @csrf
                                    <div class="mb-2 col-10">
                                        <label for="status">Kode Buku</label>
                                        <input type="text" name="kode_buku" id="kode_buku" class="form-control"
                                            value="{{ $buku->kode_buku }}">
                                    </div>
                                    <div class="mb-3 col-10">
                                        <label for="judul buku">Judul Buku</label>
                                        <input type="text" name="nama_buku" id="nama_buku" value="{{ $buku->nama_buku }}"
                                            class="form-control">
                                    </div>

                                    <div class="mb-2 col-10">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori_id" id="kategori_id" class="form-control pilihan">
                                            <option value=""hidden>--PILIH--</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}"
                                                    @if ($k->id == $buku->kategori_id) selected @endif>
                                                    {{ $k->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-2 col-10">
                                        <label for="pengarang">Pengarang / Penerbit</label>
                                        <input type="text" name="pengarang" id="pengarang" value="{{ $buku->pengarang }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-2 col-10">
                                        <label for="tahun_terbit">Tahun Diterbitkan</label>
                                        <input type="text" name="tahun_terbit" id="tahun_terbit"
                                            value="{{ $buku->tahun_terbit }}" class="form-control">
                                    </div>
                                    <div class="mb-2 col-10">
                                        <label for="status">Status</label>
                                        <select name="rak_id" id="rak_id" class="form-control selection">
                                            <option value=""hidden>--PILIH--</option>
                                            <option value="">in stock </option>
                                            <option value=""> not available</option>
                                        </select>
                                    </div>
                                    <div class="mb-2 col-10">
                                        <label for="status">Deskripsi / Sinopsis</label>
                                        <textarea type="text" name="deskripsi" id="deskripsi" class="form-control">{{ $buku->deskirpsi }}</textarea>
                                    </div>

                                    <div class="mb-2 col-10">
                                        <label for="image">image</label>
                                        <input type="file" name="image" id="image" value="{{ $buku->gambar }}"
                                            class="form-control" onchange="showPreview(event);">
                                        <img class="img-preview img-fluid">
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
                                        {{-- <img src="{{ asset('storage/gambar/' . $buku->gambar) }}"alt="Card image cap"
                                            width="320px" height="450px"> --}}
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
