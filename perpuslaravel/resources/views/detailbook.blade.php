@extends('template.main')
@section('titleatas')
    Detail Buku
@endsection

@section('content')
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ '/book' }}">Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
            </ol>
        </div>
    </section>
    <section class="product-page pb-4 pt-4">
        <div class="container">
            <div class="row product-detail-inner">
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="product-images" class="carousel slide" data-ride="carousel">
                        <!-- slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active"> <img src="{{ asset('storage/gambar/' . $buku->gambar) }}"
                                    alt="Product 1"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-detail">
                        <h2 class="product-name">{{ $buku->nama_buku }}</h2>
                        <div class="product-price">
                            <span class="badge  {{ $buku->status == 'in stock' ? 'badge-primary' : 'badge-danger' }}">Status
                                : {{ $buku->status }}</span>
                        </div>
                        <div class="product-short-desc">
                            <p><b>Kategori : {{ $buku->kategori->nama_kategori }}</p>
                            <p><b>Pengarang / Penerbit : {{ $buku->pengarang }}</p>
                            <p><b>Tahun Terbit : {{ $buku->tahun_terbit }}</p>
                            <p><b>Deskripsi / Sinopsis : <br>
                                    {{ $buku->deskripsi }}</p>
                        </div>
                        <div class="product-select">
                            <form method="POST" action="{{ url('bukupinjam/' . $buku->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">pinjam</button>
                            </form>
                        </div>
                        <div class="product-share">
                            <ul>
                                <li class="categories-title">Share :</li>
                                <li><a
                                        href="https://www.facebook.com/?stype=lo&jlou=AfeKZj9AEZhF7AcGPMM1WJ2AfrZd7fIwujdg9BRrlsx0G7qcxeNhhFHAfvKOjnDf3oBf2VtxJLfDOfQ8K0e0TSDomxdo-RzSxdhaQzM1ka3wRQ&smuh=9516&lh=Ac-KLZv5KwZ9Bb6f4uk"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/?hl=id"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://twitter.com/?lang=id"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
