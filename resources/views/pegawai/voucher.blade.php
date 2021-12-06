@extends('pegawai.layout')

@section('content')
@endsection

@section('ajaxquery')
<script>
    $(document).ready(function(){
        $('.nav-item').removeClass('active');
        $('#voucher').addClass('active');
    });
</script>
@endsection