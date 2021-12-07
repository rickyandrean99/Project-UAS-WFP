@extends('user.layout')

@section('title', 'Checkout')

<style>
    .nav-gradient { opacity: 1 !important; }
    .active > .page-link { background: #3BD744 !important; border: 0 !important; }
</style>

@section('content')
    <div class="container pt-5 mt-5" style="min-height: 850px">
        <div class="h2 pop-semibold pt-4 mb-5 pb-4 text-center">
            Checkout Produk
        </div>

        <div class="row p-0 m-0">
            <!-- Daftar produk di keranjang -->
            <div class="col-6 p-0 m-0">
                <div class="row m-0 p-0">
                    @foreach(session('keranjang') as $id => $produk)
                        <div class="col-12 p-0 my-2">
                            <div class="w-100 row m-0 p-0 border">
                                <div class="col-3 m-0 p-1">
                                    <img src="{{ asset('images/produk/'.$produk['foto'] ) }}" alt="produk" class="w-100">
                                </div>
                                <div class="col-9 m-0 ps-4 d-flex flex-column justify-content-center">
                                    <div class="pop-bold">{{ $produk['nama'] }}</div>
                                    <div class="pop-medium my-2">Jumlah: {{ $produk['kuantitas'] }}</div>
                                    <div class="pop-medium">Rp {{ number_format(($produk['kuantitas'] * $produk['harga']),2,',','.') }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Voucher, subtotal, checkout -->
            <div class="col-6 p-2 ps-5 m-0">
                <div class="h5 pop-semibold">Voucher Diskon</div>
                
                <div class="input-group mt-3 mb-2">
                    <input type="text" class="form-control" id="voucher" oninput="voucher(event)" placeholder="Masukkan voucher..." maxlength="10">
                </div>

                <div class="fst-italic pop-regular small">*Kode voucher terdiri dari 10 karakter</div>
                <div id="active-voucher">
                    @if(session('voucher') != "" || session('voucher') != null)
                        <div class="alert alert-success mt-4 pop-medium h6" role="alert">
                            Voucher {{ session('voucher') }} diaktifkan!
                        </div>
                    @endif
                </div>
                
                <div class="row m-0 mt-4 p-0 text-end">
                    <div class="col-8 mb-2 pop-medium">Subtotal&nbsp;&nbsp;&nbsp;&nbsp;:</div>
                    <div class="col-4 mb-2 pop-semibold">Rp xxxxxxxxx</div>
                    <div class="col-8 mb-2 pop-medium">Diskon&nbsp;&nbsp;&nbsp;&nbsp;:</div>
                    <div class="col-4 mb-2 pop-semibold">Rp xxxxxxxxx</div>
                    <div class="col-8 mb-2 pop-medium">Total&nbsp;&nbsp;&nbsp;&nbsp;:</div>
                    <div class="col-4 mb-2 pop-semibold">Rp xxxxxxxxx</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-voucher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-text"></h6>
                    <button type="button" class="btn-close my-1 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(_=> {
            $('.nav-link').removeClass("text-dark")
            $('.nav-link').addClass("text-white")
        })

        const voucher = event => {
            let voucher = event.target.value

            if (voucher.length == 10) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("voucher.check") }}',
                    data: {
                        '_token': '<?php echo csrf_token(); ?>',
                        'voucher': voucher
                    },
                    success: data => {
                        if (data.result == "sukses") {
                            $('#active-voucher').html(`
                                <div class="alert alert-success mt-4 pop-medium h6" role="alert">
                                    Voucher ${voucher} diaktifkan!
                                </div>`
                            )

                            $('#modal-text').text("Voucher berhasil digunakan")
                        } else {
                            $('#modal-text').text("Voucher tidak valid!")
                        }

                        $('#modal-voucher').modal("show")
                    }
                })
            }
        }
    </script>
@endsection