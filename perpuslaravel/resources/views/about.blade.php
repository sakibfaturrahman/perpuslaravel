@extends('template.main')
@section('titleatas')
    About
@endsection

@section('content')
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
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
                            <div class="carousel-item active"> <img
                                    src="{{ asset('/') }}assetsfront/assets/img/products/1.jpg" alt="Product 1"> </div>
                            <div class="carousel-item"> <img src="{{ asset('/') }}assetsfront/assets/img/products/2.jpg"
                                    alt="Product 2"> </div>
                            <div class="carousel-item"> <img src="{{ asset('/') }}assetsfront/assets/img/products/3.jpg"
                                    alt="Product 3"> </div>
                        </div> <!-- Left right -->
                        <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span
                                class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next"
                            href="#product-images" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                            <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected"
                                    data-slide-to="0" data-target="#product-images"> <img
                                        src="{{ asset('/') }}assetsfront/assets/img/products/1.jpg" class="img-fluid">
                                </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1"
                                    data-target="#product-images"> <img
                                        src="{{ asset('/') }}assetsfront/assets/img/products/2.jpg" class="img-fluid">
                                </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2"
                                    data-target="#product-images"> <img
                                        src="{{ asset('/') }}assetsfront/assets/img/products/3.jpg" class="img-fluid">
                                </a> </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-detail">
                        <h2 class="product-name">Apa itu E-Library?</h2>
                        <div class="product-price">
                            <span class="price">E-Library</span>
                        </div>
                        <div class="product-short-desc">
                            <p>Merupakan perpustakaan berbasis web yang bertujuan memudahkan anggota untuk meminjam dan
                                mencari Buku
                                di perpustakaan dengan mudah tanpa perlu susah payah hehe:v
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
