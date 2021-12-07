@extends('user.layout')

@section('title', 'Keranjang')

<style>
    .nav-gradient { opacity: 1 !important; }
    .active > .page-link { background: #3BD744 !important; border: 0 !important; }
</style>

@section('content')
    <div class="container pt-5 mt-5" style="min-height: 850px">
        <div class="h2 pop-semibold pt-4 mb-5 pb-4 text-center">
            Keranjang Belanja
        </div>

        @if(session('keranjang'))
            <div class="mb-3 text-end">
                <button type="button" class="btn text-white pop-medium h4 px-3 py-2" onclick="simpanKeranjang()" style="background: linear-gradient(90.42deg, #42B549 -28.17%, #3BD744 50.91%, #4CEA56 114.5%);">Simpan Perubahan</button>
            </div>

            <table class="table table-hover table-bordered text-center" style="vertical-align: middle;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $i = 0;
                        $subtotal = 0;
                    @endphp
                    @foreach(session('keranjang') as $id => $produk)
                        @php 
                            $i++;
                            $total = $produk['kuantitas']*$produk['harga'];
                            $subtotal += $total;
                        @endphp
                        <tr class="produk" produk="{{ $id }}">
                            <th scope="row">{{ $i }}</th>
                            <td style="width: 15%;"><img src="{{ asset('images/produk/'.$produk['foto'] ) }}" alt="produk" class="w-100"></td>
                            <td>{{ $produk['nama'] }}</td>
                            <td id="harga-{{ $id }}" harga="{{ $produk['harga'] }}">Rp {{ number_format($produk['harga'],2,',','.') }}</td>
                            <td style="width: 20%;">
                                <button type="button" class="btn border-0 text-white pop-semibold h4 px-3 py-2" onclick="ubahKuantitas({{ $id }}, -1)" style="background: linear-gradient(87.03deg, #BF5749 -16.34%, #E95743 65.69%, #F5635A 131.66%)">-</button>
                                <span id="kuantitas-{{ $id }}" class="px-4">{{ $produk['kuantitas'] }}</span>
                                <button type="button" class="btn border-0 text-white pop-semibold h4 px-3 py-2" onclick="ubahKuantitas({{ $id }}, 1)" style="background: linear-gradient(90.42deg, #42B549 -28.17%, #3BD744 50.91%, #4CEA56 114.5%);">+</button>
                            </td>
                            <td style="width: 20%;"><span id="total-harga-{{ $id }}">Rp {{ number_format($total,2,',','.') }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="py-3 pop-bold" colspan="5">Subtotal</td>
                        <td class="py-3"><span class="pop-bold" id="subtotal">Rp {{ number_format($subtotal,2,',','.') }}</span></td>
                    </tr>
                </tfoot>
            </table>

            <div class="mt-5 text-end">
                <button type="button" class="btn text-white pop-medium h4 px-3 py-2" onclick="redirectCheckout()" style="background: linear-gradient(90.42deg, #42B549 -28.17%, #3BD744 50.91%, #4CEA56 114.5%);">Proses Checkout</button>
            </div>
        @else
            <div class="h6 mt-5 text-center fst-italic pop-medium">Kamu belum menambahkan produk apapun ke keranjang</div>
        @endif
    </div>

    <div class="modal fade" id="modal-keranjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Berhasil menyimpan keranjang</h6>
                    <button type="button" class="btn-close my-1 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let listId = $("tr[class='produk']").map(function(){ return $(this).attr("produk")} ).get()
        
        $(document).ready(_=> {
            $('.nav-link').removeClass("text-dark")
            $('.nav-link').addClass("text-white")
        })

        const ubahKuantitas = (id, nilai) => {
            let nilaiBaru = parseInt($(`#kuantitas-${id}`).text()) + parseInt(nilai)
            
            if (nilaiBaru > 0) {
                let total = parseInt($(`#harga-${id}`).attr("harga")) * nilaiBaru
                
                // ubah total
                $(`#kuantitas-${id}`).text(nilaiBaru)
                $(`#total-harga-${id}`).text(`Rp ${total.toLocaleString("id-ID")},00`)

                // ubah subtotal
                let subtotal = 0
                listId.forEach(idx => subtotal += parseInt($(`#kuantitas-${idx}`).text()) * parseInt($(`#harga-${idx}`).attr("harga")) )
                $('#subtotal').text(`Rp ${subtotal.toLocaleString("id-ID")},00`)
            }
        }

        const simpanKeranjang = _ => {
            let listKuantitas = listId.map(idx => {
                return parseInt($(`#kuantitas-${idx}`).text())
            })

            $.ajax({
                type: 'POST',
                url: '{{ route("keranjang.ubah") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'listId': listId,
                    'listKuantitas': listKuantitas
                },
                success: data => {
                    if (data.result == "sukses")
                        $('#modal-keranjang').modal("show")
                }
            })
        }

        const redirectCheckout = _ => {
            let listKuantitas = listId.map(idx => {
                return parseInt($(`#kuantitas-${idx}`).text())
            })

            $.ajax({
                type: 'POST',
                url: '{{ route("keranjang.ubah") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'listId': listId,
                    'listKuantitas': listKuantitas
                },
                success: data => {
                    if (data.result == "sukses")
                        window.location.href = "/checkout"
                }
            })
        }
    </script>
@endsection