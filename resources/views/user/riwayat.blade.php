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
                <div class="col-12 p-4 mb-4 border d-flex flex-wrap">
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
                    <div class="mb-2" style="width: 85%">
                        @if($t->status)
                            <span class="pop-bold text-success">Sudah dikonfirmasi</span>
                        @else
                            <span class="pop-bold text-danger">Belum Dikonfirmasi</span>
                        @endif
                    </div>
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