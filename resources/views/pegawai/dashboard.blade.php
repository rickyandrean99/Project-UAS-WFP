@extends('pegawai.layout')

@section('content')
<div class="container">
    <div class="h2 poppins-normal text-center custom-text-color font-weight-bold mb-5">Selamat Datang di Halaman Administrasi</div>
</div>
@endsection

@section('ajaxquery')
    <script>
        $(document).ready(function(){
            $('.nav-item').removeClass('active');
            $('#dashboard').addClass('active');
        });
    </script>
@endsection