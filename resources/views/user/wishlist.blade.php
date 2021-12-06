@extends('user.layout')

@section('title', 'Wishlist')

<style>
    .nav-gradient { opacity: 1 !important; }
    .active > .page-link { background: #3BD744 !important; border: 0 !important; color: white !important }
</style>

@section('content')
    <div class="container pt-5 mt-5">
        <div class="h2 pop-semibold pt-4 mb-5 text-center">
            Daftar Wishlist
        </div>
        
        <div class="row">
            @foreach($produks as $p)
                <div class="pe-4 mb-4" style="width: 20%; ">
                    <a href="/produk/{{ $p->id }}" class="text-decoration-none">
                        <div class="card w-100 align-items-center" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.2);">
                            <img src="{{ asset('images/produk/'.$p->foto) }}" alt="" class="w-50 mx-5 my-4">
                            <div class="card-body m-0 px-3 py-4 text-center" style="height: 150px;">
                                <div class="card-title h6 pop-medium" style="line-height: 1.5rem">{{ $p->nama }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(_=> {
            $('.nav-link').removeClass("text-dark")
            $('.nav-link').addClass("text-white")
        })
    </script>
@endsection