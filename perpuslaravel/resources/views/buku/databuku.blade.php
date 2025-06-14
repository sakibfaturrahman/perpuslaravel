@extends('layout.main')

@section('title')
    Data Buku
@endsection

@section('breadcrumbs')
    Data Buku
@endsection

@section('judul')
    Data Buku
@endsection

@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Buku</h6>
                        <a href="{{ url('buku/create') }}" class="btn btn-sm btn-primary"> Add
                            Buku</a>
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
                                Gambar</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Judul Buku</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/gambar/' . $item->gambar) }}"alt="Card image cap"
                                            style="width: 100px" height="150px"></td>
                                    <td>{{ $item->nama_buku }}</td>
                                    <td>
                                        <p
                                            class="badge badge-pill {{ $item->status == 'in stock' ? 'bg-gradient-primary' : 'bg-gradient-danger' }}">
                                            Status: {{ $item->status }}</p>
                                    </td>

                                    <td>
                                        <a href="{{ url('buku/detail', $item->id) }}" class="btn btn-sm btn-warning"><i
                                                class="fa fa-info-circle"></i> Detail</a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal{{ $item->id }}">
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

    @foreach ($buku as $item)
        <div class="col-md-4">
            <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Hapus Buku</h3>
                                </div>
                                <div class="card-body">
                                    <form method="get" action="{{ url('buku/hapus', $item->id) }}">
                                        @csrf
                                        <label>Nama Buku :</label>
                                        <br><br>
                                        <p>Yakin ingin hapus <strong>{{ $item->nama_buku }}</strong> dari daftar buku?
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
    @endforeach
@endsection
