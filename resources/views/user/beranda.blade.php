@extends('user.layout')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <div class="w-100 py-5 px-0 m-0" style="background: url('{{ asset('images/hero.jpg') }}'); height: 960px; background-size: cover;">
        <div class="row justify-content-end h-100 p-0 m-0">
            <div class="col-5 h-100 d-flex align-items-center pb-5">
                <div>
                    <div class="h1 pop-semibold">BukaLaptop</div>
                    <div class="h4 mt-4">
                        Solusi Jual Beli Laptop Mudah dan Terpercaya
                    </div>
                    <div class="mt-4">
                        <ul>
                            <li class="mb-2">Kemudahan Transaksi Produk 24/7</li>
                            <li class="mb-2">Tersedia promo pada waktu tertentu</li>
                            <li class="mb-2">Keamanan akun yang baik</li>
                        </ul>
                    </div>
                    <div class="mt-5">
                        <a href="#kategori" class="btn pop-medium text-white w-50" style="background: linear-gradient(90.42deg, #42B549 -28.17%, #3BD744 50.91%, #4CEA56 114.5%);">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Section -->
    <div class="container p-5" id="kategori">
        <div class="h4 pop-semibold mt-5">Kategori Produk</div>

        <div class="row mt-5">
            @foreach($kategori as $k)
                <div class="pe-4" style="width: 20%;">
                    <a href="/produk/kategori/{{ str_replace(' ', '-', strtolower($k->nama)) }}" class="text-decoration-none">
                        <div class="card w-100 align-items-center" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.2)">
                            <img src="{{ asset('images/'.$k->nama.'.png') }}" alt="" class="w-50 mx-5 my-4">
                            <div class="card-body m-0 px-3 py-4 text-center">
                                <div class="card-title h6 pop-medium">{{ $k->nama }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Brand Section -->
    <div class="container p-5">
        <div class="h4 pop-semibold">Kategori Brand</div>

        <div class="row mt-5">
            @foreach($brand as $b)
                <div class="pe-4" style="width: 20%; ">
                    <a href="/produk/brand/{{ str_replace(' ', '-', strtolower($b->nama)) }}" class="text-decoration-none">
                        <div class="card w-100 align-items-center" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.2)">
                            <img src="{{ asset('images/logo/'.$b->nama.'.png') }}" alt="" class="w-50 mx-5 my-4">
                            <div class="card-body m-0 px-3 py-4 text-center">
                                <div class="card-title h6 pop-medium">{{ $b->nama }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Product Teratas Section -->
    <div class="container p-5">
        <div class="h4 pop-semibold">Produk Teratas</div>

        <div class="row mt-5">
            @foreach($produk as $p)
                <div class="pe-4" style="width: 20%; ">
                    <a href="/produk/{{ $p->id }}" class="text-decoration-none">
                        <div class="card w-100 align-items-center" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.2);">
                            <img src="{{ asset('images/produk/'.$p->foto) }}" alt="" class="w-50 mx-5 my-4">
                            <div class="card-body m-0 px-3 py-4 text-center" style="height: 100px">
                                <div class="card-title h6 pop-medium">{{ $p->nama }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(_=> {
            $(window).scroll(_=>{
                if ($(window).scrollTop() > 100) {
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
@endsection