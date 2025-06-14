@extends('template.main')
@section('titleatas')
    profil
@endsection

@section('content')
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->name }}</li>
            </ol>
        </div>
    </section>

    <div class="card-body p-4">
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
                        <div class="col-md-8">
                            <center>
                                <span><strong> Rincian Profil </strong></span>
                            </center>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Name</label>
                                <input name="name" id="name" value="{{ Auth::user()->name }}" class="form-control"
                                    type="text">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input name="username" id="username" value="{{ Auth::user()->username }}"
                                    class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Phone</label>
                                <input name="phone" id="phone" value="{{ Auth::user()->phone }}" class="form-control"
                                    type="text">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Address</label>
                                <input name="alamat" id="alamat" value="{{ Auth::user()->alamat }}" class="form-control"
                                    type="text">
                            </div>
                            <div class="justify-content-end d-flex">
                                <a href="{{ url('pinjam') }}" class="btn btn-success">
                                    Riwayat Pinjaman</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
