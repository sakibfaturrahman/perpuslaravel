@extends('template.main')
@section('titleatas')
    E-library
@endsection

@section('content')
    <section class="slider-section pt-4 pb-4">
        <div class="container">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="nav-category">
                            <h2>Kategori Buku</h2>
                            @foreach ($kategori as $item)
                                <ul class="menu-category">
                                    <li><a href="{{ url('/kategori/buku', $item->id) }}">{{ $item->nama_kategori }}</a></li>
                                </ul>
                            @endforeach
                        </nav>
                    </div>
                    <div class="col-md-9">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner shadow-sm rounded">
                                <div class="carousel-item active">
                                    <img class="d-block w-100"
                                        src="{{ asset('/') }}assetsfront/assets/img/slides/slide1.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                        src="{{ asset('/') }}assetsfront/assets/img/slides/slide2.jpg"
                                        alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                        src="{{ asset('/') }}assetsfront/assets/img/slides/slide3.jpg" alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Slider -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-info mr-4">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="media-body">
                            <h5>Hak Buku</h5>
                            <p class="text-muted">
                                Anggota Hanya memiliki Hak untuk meminjam maksimal 3 buku .
                                jika telah melakukan pinjaman buku, silhkan datang ketempat petugas untuk melakukan
                                konfirmasi dan pengambilan buku.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-purple mr-4">
                            <i class="fa fa-clock-o "></i>
                        </div>
                        <div class="media-body">
                            <h5>Jadwal Perpustakan</h5>
                            <p class="text-muted">
                                Perpustakaan Dibuka Mulai jam 08:00 - 16:00.
                                <br>
                                <br>
                                Perhatian :
                                Jika Buku Ber Status in stock maka buku bisa dipinjam
                                dan jika buku berstatus not available maka buku tidak bisa dipinjam
                                atau sedang dipinjam oleh orang lain.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="media-body">
                            <h5>Batas Peminjaman</h5>
                            <p class="text-muted">
                                Setiap Anggota dapat meminjam buku maksimal 1 minggu.
                                jika pengembalian lebih dari waktu yang ditentukan maka akan diberikan denda 50.000.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->
    <section class="products-grids trending pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="breadcrumb-section pb-3 pt-3">
                        <div class="container">
                            <div class="section-title">
                                <h2>Rekomendasi Buku Untukmu</h2>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
            <br>
            <div class="row">
                @foreach ($buku as $buku)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{ url('/bukudetail', $buku->id) }}">
                                    <img src="{{ asset('storage/gambar/' . $buku->gambar) }}" class="img-fluid" />
                                </a>
                            </div>
                            <div class="product-content">
                                <center>
                                    <h3><a href="{{ url('/bukudetail', $buku->id) }}">{{ $buku->nama_buku }}</a></h3>
                                </center>
                                <div class="product-price">
                                    <center><span
                                            class="badge  {{ $buku->status == 'in stock' ? 'badge-primary' : 'badge-danger' }}">Status
                                            : {{ $buku->status }}</span>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- footer --}}
@endsection
