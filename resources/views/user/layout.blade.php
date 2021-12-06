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
    <body class="p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <!-- Desktop navigation -->
            <nav class="navbar navbar-expand-lg navbar-light sticky-top py-4 w-100 position-fixed navigation-desktop">
                <div class="position-absolute w-100 h-100 nav-gradient" style="top: 0"></div>

                <div class="container position-relative py-2">
                    <!-- <img src="{{ asset('images/logo.png') }}" alt="" style="width: 140px"> -->
                    
                    <div class="collapse navbar-collapse mt-0 position-absolute" style="right: 0">
                        <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                            <li class="nav-item me-5 py-2"><a class="nav-link text-dark pop-medium" href="/">Beranda</a></li>
                            <li class="nav-item me-5 py-2"><a class="nav-link text-dark pop-medium" href="/produk">Produk</a></li>
                            <li class="nav-item me-5 py-2"><a class="nav-link text-dark pop-medium" href="/banding">Bandingkan</a></li>
                            @if(Auth::user())
                            <li class="nav-item dropdown me-5 py-2">
                                <a class="nav-link text-dark pop-medium dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">    
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item pop-medium" href="/wishlist">Wishlist</a></li>
                                    <li><a class="dropdown-item pop-medium" href="/keranjang">Keranjang</a></li>
                                    <li><a class="dropdown-item pop-medium" href="/riwayat">Riwayat</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item pop-medium" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form></li>
                                </ul>
                            </li>
                            @else
                            <li class="nav-item me-5 py-2"><a class="nav-link text-dark pop-medium" href="/login">Login</a></li>
                            @endif
                        </ul> 
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-0 m-0">
                @yield("content")
            </div>

            <footer class="container-fluid p-4 text-center text-white mt-4" style="background: linear-gradient(90.42deg, #42B549 -28.17%, #3BD744 50.91%, #4CEA56 114.5%);">
                © 2021 BukaLaptop All Right Reserved
            </footer>
        </div>
    </body>
</html>
