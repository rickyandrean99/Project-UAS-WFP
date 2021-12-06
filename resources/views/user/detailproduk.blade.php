@extends('user.layout')

@php $title = $produk->nama @endphp
@section('title', "$title")

<style>
    .nav-gradient { opacity: 1 !important; }
</style>

@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-5 px-5 py-0">
                <img src="{{ asset('images/produk/'.$produk->foto) }}" alt="foto-produk" class="w-100">
            </div>
            <div class="col-7 py-4 px-3">
                <div class="row">
                    <div class="col-10 p-0 m-0">
                        <div class="h4 pop-medium">{{ $produk->nama }}</div>
                        <div class="h6 pop-regular mt-2">
                            <img src="{{ asset('images/wishlist_red.png') }}" alt="like" style="width: 25px" class="me-2">
                            <span id="jumlah_wishlist">{{ $wishlist }}</span> orang menandai produk ini
                        </div>
                    </div>

                    <div class="col-2 p-0 m-0 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            @if(Auth::user())
                                <a href="#" class="btn p-0 m-0 d-inline" onclick="wishlist()">
                                    @if($wish_status)
                                        <img src="{{ asset('images/wishlist_fill.png') }}" alt="wishlist" id="wishlist" class="w-25">
                                    @else
                                        <img src="{{ asset('images/wishlist.png') }}" alt="wishlist" id="wishlist" class="w-25">
                                    @endif
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="h5 pop-bold mt-4">
                    @if(Auth::user())
                        Rp {{ number_format($produk->harga,2,',','.') }}
                    @else
                        Rp {{ str_pad(Str::limit($produk->harga, 1, ''), strlen(($produk->harga)-1),'X', STR_PAD_RIGHT) }} 
                    @endif
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
                <div class="mt-5">
                    @if(Auth::user())
                        <!-- ada pengecekan apakah ada di keranjang atau gak -->
                        @if($cart_status)
                            <a href="#" class="btn btn-primary p-3 border-0" id="btn-keranjang" style="background: linear-gradient(87.03deg, #BF5749 -16.34%, #E95743 65.69%, #F5635A 131.66%);" onclick="keranjang('hapus')">
                                <img src="{{ asset('images/cart.png') }}" alt="cart" style="width: 25px" class="me-2">
                                <span id="status-keranjang" class="text-white">Hapus dari keranjang</span>
                            </a>
                        @else
                            <a href="#" class="btn btn-primary p-3 border-0" id="btn-keranjang" style="background: linear-gradient(90.42deg, #42B549 -28.17%, #3BD744 50.91%, #4CEA56 114.5%);" onclick="keranjang('tambah')">
                                <img src="{{ asset('images/cart.png') }}" alt="cart" style="width: 25px" class="me-2">
                                <span id="status-keranjang" class="text-white">Masukkan keranjang</span>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div style="height: 150px"></div>
    </div>

    <div class="modal fade" id="modal-keranjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close my-1 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 id="modal-text"></h6>
                </div>
            </div>
        </div>
    </div>

    <script>
        let id = {{ $produk->id }}

        $(document).ready(_=> {
            $('.nav-link').removeClass("text-dark")
            $('.nav-link').addClass("text-white")
        })

        const wishlist = _ => {
            $.ajax({
                type: 'POST',
                url: '{{ route("produk.wishlist") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: data => {
                    if (data.result == 'add')
                        $('#wishlist').attr("src", `{{ asset('images/wishlist_fill.png') }}`)
                    else
                        $('#wishlist').attr("src", `{{ asset('images/wishlist.png') }}`)
                    
                    let amountNow = parseInt($('#jumlah_wishlist').text())
                    $('#jumlah_wishlist').text(amountNow + data.amount)
                }
            })
        }

        const keranjang = tipe => {
            $.ajax({
                type: 'POST',
                url: '{{ route("keranjang.tambahhapus") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'tipe': tipe,
                    'jumlah': 1,
                },
                success: data => {
                    if (data.result == "sukses") {
                        if (tipe == "tambah") {
                            $('#status-keranjang').text("Hapus dari keranjang")
                            $('#btn-keranjang').attr('onclick', `keranjang('hapus')`)
                            $('#btn-keranjang').css('background', `linear-gradient(87.03deg, #BF5749 -16.34%, #E95743 65.69%, #F5635A 131.66%)`)
                            $('#modal-text').text("Berhasil menambahkan ke keranjang")
                        } else if (tipe == "hapus") {
                            $('#status-keranjang').text("Masukkan keranjang")
                            $('#btn-keranjang').attr('onclick', `keranjang('tambah')`)
                            $('#btn-keranjang').css('background', `linear-gradient(90.42deg, #42B549 -28.17%, #3BD744 50.91%, #4CEA56 114.5%)`)
                            $('#modal-text').text("Berhasil menghapus dari keranjang")
                        }
                    } else {
                        if (tipe == "tambah")
                            $('#modal-text').text("Gagal menambahkan ke keranjang")
                        else if (tipe == "hapus")
                            $('#modal-text').text("Gagal menghapus dari keranjang")
                    }

                    $('#modal-keranjang').modal("show")
                }
            })
        }
    </script>
@endsection