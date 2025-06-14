<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('/') }}assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">E-Library</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('buku') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book-bookmark text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ url('kategori') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Kategori Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ url('rak') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-bars text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Rak Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ url('data/pinjam') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-bookmark-o text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Pinjaman Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ url('user') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data user</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-sign-out text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Log out</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ url('/') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-share text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Go to App</span>
                </a>
            </li>
</aside>
