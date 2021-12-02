@extends('user.layout')

@section('title', 'Produk')

<link rel="stylesheet" href="{{ asset('css/produk.css') }}">

@section('content')
    {{ $kategori }}
@endsection