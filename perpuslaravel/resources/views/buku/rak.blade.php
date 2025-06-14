@extends('layout.main')

@section('title')
    Rak
@endsection

@section('breadcrumbs')
    Data Rak
@endsection

@section('judul')
    Data Rak
@endsection

@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Rak</h6>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">Add Rak</button>
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
                                            Rak</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Baris</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rak as $r)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $r->rak }}</td>
                                            <td>{{ $r->baris }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal{{ $r->id }}">
                                                    Edit
                                                </button>

                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapusModal{{ $r->id }}">
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
                                    <h3 class="font-weight-bolder text-info text-gradient">Tambah Rak</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('rak/tambah') }}">
                                        @csrf
                                        <label>Rak No</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nama Rak" name="rak"
                                                id="rak">
                                        </div>
                                        <label>Baris</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nama Rak" name="baris"
                                                id="baris">
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
    @foreach ($rak as $r)
        <div class="col-md-4">
            <div class="modal fade" id="EditModal{{ $r->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Edit Rak</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ url('rak/edit', $r->id) }}">
                                        @csrf
                                        <label>Rak</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{ $r->rak }}"
                                                name="rak" id="rak">
                                        </div>
                                        <label>Baris</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{ $r->baris }}"
                                                name="baris" id="baris">
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
    @foreach ($rak as $r)
        <div class="col-md-4">
            <div class="modal fade" id="hapusModal{{ $r->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Hapus Rak</h3>
                                </div>
                                <div class="card-body">
                                    <form method="get" action="{{ url('rak/hapus', $r->id) }}">
                                        @csrf
                                        <label>Rak</label>
                                        <br><br>
                                        <p>Yakin ingin hapus Rak <strong>{{ $r->rak }}</strong> dari daftar rak?
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
@endsection
