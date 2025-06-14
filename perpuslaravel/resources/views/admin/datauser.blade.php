@extends('layout.main')

@section('title')
    Data User
@endsection

@section('breadcrumbs')
    Data User
@endsection

@section('judul')
    Data User
@endsection

@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data User</h6>
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <form action="" class="search" method="get">
                                <div class="input-group">
                                    <span class="input-group-text text-body"><button type="submit" class="form-control"><i
                                                class="fas fa-search" aria-hidden="true"></i></button></span>
                                    <input type="search" class="form-control" name="search" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                        </div>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Username</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Role</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        <a href="{{ url('detail', $user->id) }}" class="btn btn-sm btn-warning"><i
                                                class="ri-edit-2-line"> Detail</i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal{{ $user->id }}">
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
@endsection
