@extends('user.layout')

@section('title', "Perbandingan Produk")

<style>
    .nav-gradient { opacity: 1 !important; color: white !important; }
</style>

@section('content')
    <div class="container pt-5 mt-5 pb-5" style="min-height: 850px">
        <div class="h3 pop-medium text-center mt-4">Bandingkan Produk</div>
        
        <div class="row m-0 p-0 mt-4">
            <div class="col-12 m-0 px-2">
                <select class="form-select mt-5" onchange="ubahTipe()" id="select-tipe">
                    <option value="0" disabled selected>-- Pilih Tipe Produk --</option>
                    <option value="1">Laptop</option>
                    <option value="2">Aksesoris</option>
                    <option value="3">Spare Part</option>
                </select>
            </div>

            @for($i = 1; $i <= 3; $i++)
                <div class="col-4 m-0 px-2 py-0">
                    <select class="form-select mt-5" id="select-tipe-{{ $i }}" onchange="ubahProduk({{ $i }})" disabled>
                        <option value="0" disabled selected>-- Pilih Produk --</option>
                    </select>

                    <div id="produk-{{ $i }}">
                        
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <script>
        $(document).ready(_=> {
            $('.nav-link').removeClass("text-dark")
            $('.nav-link').addClass("text-white")
        })

        const ubahTipe = _ => {
            let tipe = $('#select-tipe').val()
            
            if (tipe != 0) {
                for (let i = 1; i <= 3; i++) {
                    $(`#select-tipe-${i}`).removeAttr("disabled")
                }
            }

            $.ajax({
                type: 'POST',
                url: '{{ route("produk.produkberdasarkantipe") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'tipe': tipe
                },
                success: data => {
                    for (let i = 1; i <= 3; i++) {
                        $(`#produk-${i}`).html("")
                        $(`#select-tipe-${i}`).html(`<option value="0" disabled selected>-- Pilih Produk --</option>`)

                        data.produk.forEach(produk => {
                            $(`#select-tipe-${i}`).append(`<option value="${produk.id}">${produk.nama}</option>`)
                        })
                    }
                }
            })
        }

        const ubahProduk = id => {
            let idProduct = $(`#select-tipe-${id}`).val()

            $.ajax({
                type: 'POST',
                url: '{{ route("produk.detailberdasarkanproduk") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': idProduct
                },
                success: data => {
                    let specs = data.produk.spesifikasi.split(";").map(spec => {
                        return `${spec},<br>`
                    })

                    let specification = ""
                    specs.forEach(spec => specification += spec)

                    $(`#produk-${id}`).html(`
                        <div class="card w-100 mt-4">
                            <img class="w-100" src="{{ asset('images/produk/${data.produk.foto}') }}">
                            <div class="card-body pt-4 px-4">
                                <!-- Nama Produk -->
                                <div class="row m-0 p-0">
                                    <div class="col-3 m-0 p-0 ps-2">
                                        Produk&nbsp;&nbsp;:
                                    </div>
                                    <div class="col-9 m-0 p-0">
                                        ${data.produk.nama}
                                    </div>
                                </div>

                                <!-- Harga Produk -->
                                <div class="row m-0 p-0 mt-3">
                                    <div class="col-3 m-0 p-0 ps-2">
                                        Harga&nbsp;&nbsp;&nbsp;:
                                    </div>
                                    <div class="col-9 m-0 p-0">
                                        Rp ${(data.produk.harga).toLocaleString("id-ID")},00
                                    </div>
                                </div>

                                <!-- Harga Produk -->
                                <div class="row m-0 p-0 mt-3">
                                    <div class="col-3 m-0 p-0 ps-2">
                                        Specs&nbsp;&nbsp;&nbsp;:
                                    </div>
                                    <div class="col-9 m-0 p-0">
                                        ${specification}
                                    </div>
                                </div> 
                            </div>
                        </div>
                    `)
                }
            })
        }
    </script>
@endsection