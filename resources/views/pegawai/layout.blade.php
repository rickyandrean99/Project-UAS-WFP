<!doctype html>
<html lang="en">
    <head>
        @yield("title")
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        
        <!-- Material Kit CSS -->
        <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />

        <style>
            .cardhover {
                transition: 0.4s;
            }

            .cardhover:hover {
                transform: scale(1.1);
                cursor: pointer;
            }
        </style>
        
        @yield('ajaxquery')
    </head>

    <body>
        <div class="wrapper ">
            <div class="sidebar" data-color="orange" data-background-color="white">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="ini logo" class="rounded mx-auto d-block w-75">
                </div>

                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item" id="dashboard">
                            <a class="nav-link" href="{{ url('dashboard') }}">
                                <i class="material-icons">space_dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>

                    @can('cekadmin')
                        <ul class="nav">
                            <li class="nav-item" id="pegawai">
                                <a class="nav-link" href="{{ url('pegawai') }}">
                                    <i class="material-icons">manage_accounts</i>
                                    <p>Pegawai</p>
                                </a>
                            </li>
                        </ul>
                    @endcan

                    <ul class="nav">
                        <li class="nav-item active" id="brand">
                            <a class="nav-link" href="{{ url('brand') }}">
                                <i class="material-icons">view_list</i>
                                <p>Brand</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav">
                        <li class="nav-item" id="kategori">
                            <a class="nav-link" href="{{ url('kategori') }}">
                                <i class="material-icons">list</i>
                                <p>Kategori</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav">
                        <li class="nav-item" id="produk">
                            <a class="nav-link" href="{{ url('produk') }}">
                                <i class="material-icons">inventory</i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav">
                        <li class="nav-item" id="transaksi">
                            <a class="nav-link" href="{{ url('transaksi') }}">
                                <i class="material-icons">receipt</i>
                                <p>Transaksi</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav">
                        <li class="nav-iteme" id="voucher">
                            <a class="nav-link" href="{{ url('voucher') }}">
                                <i class="material-icons">card_giftcard</i>
                                <p>Voucher</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse justify-content-end">
                            <span class="h4 text-capitalize fw-bold mr-3">
                                @if(Auth::user())
                                    {{ Auth::user()->name }}
                                @endif
                            </span>
                            <span class="h4 text-capitalize fw-bold mr-4 bg-primary p-2 pr-4 pl-4" style="border-radius: 20px"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-light"> {{ __('Logout') }}</a></span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        @yield("content")
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright float-right">
                            <div class="copyright float-right"> Developed by Bukalaptop </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>