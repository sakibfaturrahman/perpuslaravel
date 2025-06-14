@extends('layout.main')

@section('title')
    Data Anggota
@endsection

@section('breadcrumbs')
    Data Anggota
@endsection

@section('judul')
    Data Anggota
@endsection

@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Anggota</h6>
                        <a href="{{ url('buku/create') }}" class="btn btn-sm btn-primary"><i class="ri-edit-2-line"> Add
                                Buku</i></a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>


                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                                    @if ($message = Session::get('info'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif


                                    @if ($message = Session::get('warning'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                        </div>


                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Alamat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Telepon</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $anggota)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $anggota->nama_anggota }}</td>
                                    <td>{{ $anggota->alamat }}</td>
                                    <td>{{ $anggota->no_telp }}</td>
                                    <td>
                                        {{-- <a href="{{ url('buku/detail', $buku->id) }}" class="btn btn-sm btn-warning"><i
                                                class="ri-edit-2-line"> Detail</i></a> --}}
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

    {{-- tambah modal --}}
    <div class="col-md-4">
        <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info text-gradient">Tambah Rak</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('rak/add') }}">
                                    @csrf
                                    <label>Nomor Rak</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomor_rak" id="nomor_rak" class="form-control" required
                                            placeholder="Nomor Rak">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- edit modal
    @foreach ($rak as $rak)
        <div class="col-md-4">
            <div class="modal fade" id="editmodal{{ $rak->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Edit Rak</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('rak/ubah/' . $rak->id) }}">
                                        @csrf
                                        <label>Nomor Rak</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="nomor_rak" id="nomor_rak" class="form-control"
                                                required value="{{ $r->nomor_rak }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach --}}

    <script>
        function previewImg() {
            const gambar = document.querySelector('#gambar_barang');
            const imgPreview = document.querySelector('.preview-img');

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.scr = e.target.result;
            }
        }
    </script>
@endsection
