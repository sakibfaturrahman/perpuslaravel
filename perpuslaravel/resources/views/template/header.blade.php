<header class="header clearfix">
    <div class="header-main border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-12 col-sm-6">
                    <a class="navbar-brand mr-lg-5" href="{{ asset('/') }}">
                        <i class="fa fa-book fa-3x"></i> <span class="logo">E-Library</span>
                    </a>
                </div>
                <div class="col-lg-7 col-12 col-sm-6">
                    <form action="" class="search" method="get">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" name="nama_buku" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-12 col-sm-6">
                    <div class="right-icons pull-right d-none d-lg-block">
                        @if (Auth::check())
                            <div class="single-icon wishlist">
                                <a href="{{ url('profil') }}"><i class="fa fa-user-circle-o  fa-2x"></i></a>
                            </div>
                            <div class="single-icon wishlist">
                                <a href="{{ url('pinjam') }}"><i class="fa fa-book fa-2x"></i></a>
                            </div>
                        @else
                            <div class="single-icon shopping-cart">
                                <a href="{{ 'login' }}"><i class="fa fa-sign-in fa-2x"></i></a>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-top border-bottom">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ '/' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/book') }}">Buku</a>
                    </li>
                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>
</header>
