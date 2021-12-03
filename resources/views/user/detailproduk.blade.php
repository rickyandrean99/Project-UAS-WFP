@extends('user.layout')

@php $title = $produk->nama @endphp
@section('title', "$title")

<style>
    .nav-gradient { opacity: 1 !important; color: white !important; }
</style>

@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-5 px-5 py-0">
                <img src="{{ asset('images/produk/'.$produk->foto) }}" alt="foto-produk" class="w-100">
            </div>
            <div class="col-7 py-4 px-3">
                <div class="h4 pop-medium">{{ $produk->nama }}</div>
                <div class="h6 pop-regular mt-2">
                    <img src="{{ asset('images/like.png') }}" alt="like" style="width: 25px" class="me-2">
                    {{ $produk->like }} disukai
                </div>
                <div class="h5 pop-bold mt-4">
                    Rp {{ number_format($produk->harga,2,',','.') }}
                </div>
                <div class="mt-5">
                    <div class="h6 pop-semibold mb-3">Spesifikasi Produk :</div>
                    <div class="row p-0 m-0">
                        @foreach($produk->spesifikasi as $s)
                            <div class="col-6 p-0 m-0">
                                {{ $s }}
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(_=> {
            $('.nav-link').removeClass("text-dark")
            $('.nav-link').addClass("text-white")
        })
    </script>
@endsection