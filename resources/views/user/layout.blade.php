<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    </head>
    <body>
        <div class="container-fluid p-0">
            <!-- Desktop navigation -->
            <nav class="navbar navbar-expand-lg navbar-light sticky-top py-4 w-100 position-fixed navigation-desktop">
                <div class="position-absolute w-100 h-100 nav-gradient" style="top: 0"></div>

                <div class="container position-relative py-2">
                    <img src="{{ asset('images/logo.png') }}" alt="" style="width: 140px">
                    
                    <div class="collapse navbar-collapse mt-0 position-absolute" style="right: 0">
                        <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                            <li class="nav-item me-5 py-2"><a class="nav-link text-dark" href="#">Beranda</a></li>
                            <li class="nav-item me-5 py-2"><a class="nav-link text-dark" href="#">Produk</a></li>
                            <li class="nav-item me-5 py-2"><a class="nav-link text-dark" href="#">Bandingkan</a></li>
                            <li class="nav-item dropdown me-5 py-2">
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ricky Andrean
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Wishlist</a></li>
                                    <li><a class="dropdown-item" href="#">Keranjang</a></li>
                                    <li><a class="dropdown-item" href="#">Riwayat</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Mobile navigation -->
            <nav>
                <div class="navigation-mobile pt-4">
                    <button type="button" class="p-0 mb-2" style="background: none; outline: none; border: 0" onclick="closeNav()">
                        <img src="{{ asset('icons/x.png') }}" class="w-50" alt="">
                    </button>
                    
                    <a href="#" class="px-4 py-3 text-white d-block">Beranda</a>
                    <a href="#" class="px-4 py-3 text-white d-block">Penginapan</a>
                    <a href="#" class="px-4 py-3 text-white d-block">Berita</a>
                    <a href="#" class="px-4 py-3 text-white d-block">Reservasi</a>
                    <a href="#" class="px-4 py-3 text-white d-block">Bantuan</a>
                </div>
            </nav>

            <!-- Toggle mobile navigation -->
            <div class="position-fixed btn-nav-mobile" style="right: 8%; top: 3%;">
                <button class="navbar-toggler btn-hamburger" type="button" onclick="openNav()">
                    <div class="mt-1 mb-1 hamburger-icon"></div>
                    <div class="mb-1 hamburger-icon"></div>
                    <div class="mb-1 hamburger-icon"></div>
                </button>
            </div>

            <div class="container-fluid p-0">
                @yield("content")
            </div>

            <footer class="container-fluid p-0">
                @yield("footer")
            </footer>
        </div>

        <!-- Javascript -->
        <script>
            // Toogle/hide mobile navigation
            const openNav = _ => document.querySelector(".navigation-mobile").style.width = "60%"
            const closeNav = _ => document.querySelector(".navigation-mobile").style.width = "0"

            // Fill navigation bar for desktop view
            $(document).ready(_=> {
                $(window).scroll(_=>{
                    if ($(window).scrollTop() > 800) {
                        $('.nav-gradient').css({"opacity": "1"})
                        $('.nav-link').removeClass("text-dark")
                        $('.nav-link').addClass("text-white")
                    } else {
                        $('.nav-gradient').css({"opacity": "0"})
                        $('.nav-link').removeClass("text-white")
                        $('.nav-link').addClass("text-dark")
                    } 
                })
            })

        </script>
    </body>
</html>
