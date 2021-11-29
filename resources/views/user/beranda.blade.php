@extends('user.layout')

@section('title', 'Beranda')

@section('content')
    <div class="w-100 py-5" style="background: url('{{ asset('images/hero.jpg') }}'); height: 960px; background-size: cover;">
        <div class="row justify-content-end h-100">
            <div class="col-5 h-100 d-flex mt-5 pt-5">
                <div class="pt-5 text-dark">
                    <div class="h1">BukaLaptop</div>
                    <div class="h3">
                        Solusi tepat mencari kebutuhan laptop
                    </div>
                </div>
            </div>
        </div>
    </div>

    @for($i = 0; $i < 200; $i++)
        <div>Hello Madafaka</div>
    @endfor
@endsection