@extends('layout.main')

@section('title')
    Form Kembali
@endsection

@section('breadcrumbs')
    Form Kembali
@endsection

@section('judul')
    Form Kembali
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
                            Return a book</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <form method="POST" action="{{ route('kembali/simpan') }}">
                                    @csrf
                                    <label for="anggota">Anggota yang meminjam</label>
                                    <select name="user_id" id="user_id" class="form-control selection">
                                        <option value=""hidden>--Select--</option>
                                        @foreach ($user as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="buku">Buku yang dipinjam</label>
                                    <select name="buku_id" id="buku_id" class="form-control selection">
                                        <option value=""hidden>--Select--</option>
                                        @forelse ($buku as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_buku }} (
                                                {{ $item->kode_buku }}
                                                ) -
                                                {{ $item->status }}</option>
                                        @empty
                                            tidak ada buku yang tersedia
                                        @endforelse
                                    </select>
                                    <br>
                                    <br>
                                    <button class="btn btn-sm btn-primary" type="submit">Return</button>

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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selection').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@endsection
