<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('titleatas')</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('/') }}assetsfront/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="{{ asset('/') }}assetsfront/assets/css/font-awesome.css" rel="stylesheet">

    <!-- Jquery UI -->
    <link type="text/css" href="{{ asset('/') }}assetsfront/assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('/') }}assetsfront/assets/css/argon-design-system.min.css" rel="stylesheet">

    <!-- Main CSS-->
    <link type="text/css" href="{{ asset('/') }}assetsfront/assets/css/style.css" rel="stylesheet">

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

    @include('template.header')

    <!------------------------------------------
    SLIDER
    
    ------------------------------------------->
    @yield('content')

    <footer class="footer bg-primary">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo-footer">
                                <i class="fa fa-book fa-3x"></i> <span class="logo">E-Library</span>
                            </div>
                            <p class="text">Merupakan perpustakaan berbasis web yang bertujuan memudahkan anggota
                                untuk meminjam dan
                                mencari Buku
                                di perpustakaan dengan mudah tanpa perlu susah payah hehe:v.</p>
                            <div class="top-bar d-none d-sm-block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <ul class="top-links contact-info">
                                                <li><i class="fa fa-envelope-o"></i> <a
                                                        href="#">elibrary@gmail.com</a></li>
                                                <li><i class="fa fa-whatsapp"></i> 0859114854429</li>
                                                <li><a href="{{ 'login' }}"><i class="fa fa-user-circle-o"></i>
                                                        login</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>

                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="{{ route('logout') }}">logout</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Services</h4>
                            <ul>
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Get In Touch</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>NO. 342 - Tasikmalaya.</li>
                                    <li>Cisayong.</li>
                                    <li>elibrary@gmail.com</li>
                                    <li>0859114854429</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a
                                        href="https://www.facebook.com/?stype=lo&jlou=AfeKZj9AEZhF7AcGPMM1WJ2AfrZd7fIwujdg9BRrlsx0G7qcxeNhhFHAfvKOjnDf3oBf2VtxJLfDOfQ8K0e0TSDomxdo-RzSxdhaQzM1ka3wRQ&smuh=9516&lh=Ac-KLZv5KwZ9Bb6f4uk"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/?lang=id"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="https://www.instagram.com/?hl=id"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-inner border-top">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2023 <a href="http://google.com" target="_blank">elibrary</a>
                                    -
                                    All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </footer>
    <!-- Core -->
    <script src="{{ asset('/') }}assetsfront/assets/js/core/jquery.min.js"></script>
    <script src="{{ asset('/') }}assetsfront/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('/') }}assetsfront/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assetsfront/assets/js/core/jquery-ui.min.js"></script>

    <!-- Optional plugins -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Argon JS -->
    <script src="{{ asset('/') }}assetsfront/assets/js/argon-design-system.js"></script>

    <!-- Main JS-->
    <script src="{{ asset('/') }}assetsfront/assets/js/main.js"></script>


</body>

</html>
