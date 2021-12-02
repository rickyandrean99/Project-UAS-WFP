@extends('user.layout')

@section('title', 'Beranda')

<link rel="stylesheet" href="{{ asset('css/beranda.css') }}">

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
                        <a href="" class="btn pop-medium text-white w-50 btn-cta">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Section -->
    <div class="container p-5">
        <div class="h4 pop-semibold">Kategori Produk</div>

        <div class="row mt-5">
            @php $arr_kategori = ["Laptop", "Aksesoris", "Spare Part"]; @endphp

            @foreach($arr_kategori as $ak)
                <div class="pe-4" style="width: 20%;">
                    <a href="/produk/kategori/{{ str_replace(' ', '-', strtolower($ak)) }}" class="text-decoration-none">
                        <div class="card w-100 align-items-center" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.2)">
                            <img src="{{ asset('images/'.$ak.'.png') }}" alt="" class="w-50 mx-5 my-4">
                            <div class="card-body m-0 px-3 py-4 text-center">
                                <div class="card-title h6 pop-medium">{{ $ak }}</div>
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
            @php $arr_brand = ["Asus", "Acer", "MSI", "Corsair"]; @endphp

            @foreach($arr_brand as $ab)
                <div class="pe-4" style="width: 20%; ">
                    <a href="/produk/brand/{{ str_replace(' ', '-', strtolower($ab)) }}" class="text-decoration-none">
                        <div class="card w-100 align-items-center" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.2)">
                            <img src="{{ asset('images/'.$ab.'.png') }}" alt="" class="w-50 mx-5 my-4">
                            <div class="card-body m-0 px-3 py-4 text-center">
                                <div class="card-title h6 pop-medium">{{ $ab }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection