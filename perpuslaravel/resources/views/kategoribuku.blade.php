@extends('template.main')
@section('titleatas')
    E-library
@endsection

@section('content')
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ '/book' }}">Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori Buku</li>
            </ol>
        </div>
    </section>
    <section class="products-grid pb-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <div class="widget-content widget-categories">
                                <div class="widget-title">
                                    <h3>Kategori Buku</h3>
                                </div>
                                {{-- @foreach ($kategori as $p)
                                    <ul>
                                        <li><a href="{{ url('/kategori') }}">{{ $p->nama_kategori }}</a></li>
                                    </ul>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="products-top">
                                <span><strong> Kategori Dari {{ $kategori->nama_kategori }}</span></strong>
                                <div class="products-top-inner">
                                    <div class="products-found">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($kategori->buku as $buku)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ url('/bukudetail', $buku->id) }}">
                                            <img src="{{ asset('storage/gambar/' . $buku->gambar) }}" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <center>
                                            <h3><a href="{{ url('/bukudetail', $buku->id) }}">{{ $buku->nama_buku }}</a>
                                            </h3>
                                        </center>
                                        <div class="product-price">
                                            <center><span class="badge badge-primary">Status : {{ $buku->status }}</span>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
