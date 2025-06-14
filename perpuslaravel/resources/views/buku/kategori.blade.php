@extends('layout.main')

@section('title')
    Kategori
@endsection

@section('breadcrumbs')
    Data Kategori
@endsection

@section('judul')
    Data Kategori
@endsection

@section('isi')
    {{-- select2 instalation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Kategori</h6>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">Add Kategori</button>
                        </button>
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



                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Kategori</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Rak</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Baris</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $k)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->nama_kategori }}</td>
                                            <td>{{ $k->rak->rak }}</td>
                                            <td>{{ $k->rak->baris }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal{{ $k->id }}">
                                                    Edit
                                                </button>

                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapusModal{{ $k->id }}">
                                                    Delete
                                                </button>
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
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Tambah Kategori</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('kategori/tambah') }}">
                                        @csrf
                                        <label>Nama Kategori</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nama Kategori"
                                                name="nama_kategori" id="nama_kategori">
                                        </div>
                                        <label>Lokasi kategori</label>
                                        <div class="input-group mb-3">
                                            <select name="rak_id" id="rak_id" class="form-control ">
                                                <option value=""hidden>--PILIH--</option>
                                                @foreach ($rak as $rk)
                                                    <option value="{{ $rk->id }}">
                                                        {{ $rk->rak }}
                                                        {{ $rk->baris }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
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
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($kategori as $k)
        <div class="col-md-4">
            <div class="modal fade" id="EditModal{{ $k->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Edit Kategori</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ url('kategori/edit', $k->id) }}">
                                        @csrf
                                        <label>Nama Kategori</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{ $k->nama_kategori }}"
                                                name="nama_kategori" id="nama_kategori">
                                        </div>
                                        <label>Lokasi Kategori</label>
                                        <div class="input-group mb-3">
                                            <select name="rak_id" id="rak_id" class="form-control ">
                                                <option value=""hidden>--PILIH--</option>
                                                @foreach ($rak as $r)
                                                    <option value="{{ $r->id }}">
                                                        {{ $r->rak }}
                                                        {{ $r->baris }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
    @endforeach

    {{-- modal hapus --}}
    @foreach ($kategori as $k)
        <div class="col-md-4">
            <div class="modal fade" id="hapusModal{{ $k->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Hapus Kategori</h3>
                                </div>
                                <div class="card-body">
                                    <form method="get" action="{{ url('kategori/hapus', $k->id) }}">
                                        @csrf
                                        <label>Nama Kategori</label>
                                        <br><br>
                                        <p>Yakin ingin hapus <strong>{{ $k->nama_kategori }}</strong> dari daftar kategori?
                                        </p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
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
    @endforeach

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
