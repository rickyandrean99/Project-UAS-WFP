@extends('user.layout')

@section('title', "Riwayat Transaksi")

<style>
    .nav-gradient { opacity: 1 !important; color: white !important; }
</style>

@section('content')
    <div class="container pt-5 mt-5 pb-5" style="min-height: 850px">
        <div class="h2 pop-semibold pt-4 mb-5 pb-4 text-center">
            Riwayat Transaksi
        </div>

        <div class="row p-0 m-0">
            @foreach($transaksi as $t)
                <div class="col-12 p-5 mb-5 border d-flex flex-wrap" style="box-shadow: 0 2px 8px 2px rgba(0, 0, 0, 0.2);">
                    @php
                        $datetime = new DateTime($t->tanggal);
                        $date = $datetime->format('j F Y');
                        $time = $datetime->format('H:i');
                        $invoice = $datetime->format('Ymd').str_pad($t->id, 4, '0', STR_PAD_LEFT);
                    @endphp
                    
                    <!-- Invoice Id -->
                    <div class="pop-semibold mb-3 w-100 h6">Invoice #{{ $invoice }}</div>
                    
                    <!-- Tanggal Transaksi -->
                    <div class="mb-2" style="width: 13%">Tanggal Transaksi</div>
                    <div class="mb-2" style="width: 2%">:</div>
                    <div class="mb-2" style="width: 85%">{{ $date }}</div>

                    <!-- Waktu Transaksi -->
                    <div class="mb-2" style="width: 13%">Waktu Transaksi</div>
                    <div class="mb-2" style="width: 2%">:</div>
                    <div class="mb-2" style="width: 85%">{{ $time }}</div>

                    <!-- Diskon -->
                    <div class="mb-2" style="width: 13%">Diskon</div>
                    <div class="mb-2" style="width: 2%">:</div>
                    <div class="mb-2" style="width: 85%">{{ $t->diskon }}%</div>

                    <!-- Total -->
                    <div class="mb-2" style="width: 13%">Total</div>
                    <div class="mb-2" style="width: 2%">:</div>
                    <div class="mb-2" style="width: 85%">Rp {{ number_format($t->total,2,',','.') }}</div>

                    <!-- Status -->
                    <div class="mb-2" style="width: 13%">Status</div>
                    <div class="mb-2" style="width: 2%">:</div>
                    <div class="mb-4" style="width: 85%">
                        @if($t->status)
                            <span class="pop-bold text-success">Sudah dikonfirmasi</span>
                        @else
                            <span class="pop-bold text-danger">Belum Dikonfirmasi</span>
                        @endif
                    </div>

                    <!-- Tabel Transaksi Produk -->
                    <table class="table table-bordered text-center mt-2" style="vertical-align: middle;">
                        <thead style="vertical-align: middle;">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Total<br><span class="fst-italic small" style="font-weight: 400 !important">(Belum termasuk diskon)</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php    
                                $i = 0;
                            @endphp
                            @foreach($t->produks as $tp)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td style="width: 12%"><img src="{{ asset('images/produk/'.$tp->foto) }}" alt="produk" class="w-100"></td>
                                    <td>{{ $tp->nama }}</td>
                                    <td style="width: 15%">Rp {{ number_format($tp->pivot->harga,2,',','.') }}</td>
                                    <td style="width: 10%">{{ $tp->pivot->kuantitas }}</td>
                                    <td style="width: 20%">Rp {{ number_format(($tp->pivot->harga * $tp->pivot->kuantitas),2,',','.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
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