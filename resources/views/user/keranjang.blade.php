@extends('user.layout')

@section('title', 'Keranjang')

<style>
    .nav-gradient { opacity: 1 !important; }
    .active > .page-link { background: #3BD744 !important; border: 0 !important; }
</style>

@section('content')
    <div class="container pt-5 mt-5" style="min-height: 850px">
        <div class="h2 pop-semibold pt-4 mb-5 text-center">
            Keranjang Belanja
        </div>
        
        <div class="row">
            @if(session('keranjang'))
                @foreach(session('keranjang') as $id => $produk)
                    {{ $produk['nama'] }}
                @endforeach
            @else
                <div class="h6 mt-5 text-center fst-italic pop-medium">Kamu belum menambahkan produk apapun ke keranjang</div>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(_=> {
            $('.nav-link').removeClass("text-dark")
            $('.nav-link').addClass("text-white")
        })
    </script>
@endsection