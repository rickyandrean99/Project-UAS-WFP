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
                            <span id="jumlah_wishlist">{{ $wishlist }}</span> orang menandai produk ini
                        </div>
                    </div>
                </div>
                
                <div class="h5 pop-bold mt-4">
                        Rp {{ number_format($produk->harga,2,',','.') }}
                </div>
                <div class="mt-5">
                    <div class="h6 pop-semibold mb-3">Brand Produk :</div>
                    <div class="row p-0 m-0">
                       {{$produk->brand->nama}}
                    </div>
                </div>
                <div class="mt-5">
                    <div class="h6 pop-semibold mb-3">Kategori Produk :</div>
                    <div class="row p-0 m-0">
                       {{$produk->kategori->nama}}
                    </div>
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
        <div style="height: 150px"></div>
    </div>