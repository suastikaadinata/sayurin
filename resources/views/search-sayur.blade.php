@extends('layout')

@section('title', 'Manage Sayur')

@section('content')
    <div style="margin-bottom: 20px;" class="all-header">
        <div class="container">
            <div class="row">
                <div style="margin-bottom: 20px;"class="col-lg-6">
                    <h1>Manage Sayur</h1>
                </div>
                <div class="col-lg-2"></div>
                    <div class="col-lg-4 manage-sayur-header-search">
                        <form action="/manage-sayur/search" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" name="search" id="search" required autofocus placeholder="Cari sayur...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg btn-modif submit-btn" type="submit">
                                        <img src="{{ asset('img/search.png') }}">
                                    </button>
                                </span>                     
                            </div>  
                        </form>
                    </div>
                <div class="col-lg-2">
                    <h3>Sayuran</h3>
                </div>
                <div class="col-lg-3">
                    <a href="/manage-sayur/tambah-sayur"><button class="btn btn-default btn-lg btn-modif">
                        Tambah Sayuran
                    </button></a>
                </div>
                <div class="col-lg-7"></div>
            </div>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
        @if($search->isEmpty())
            <h3>Tidak ditemukan hasil untuk '{{ $keyword }}'</h3>
        @else
            <div class="row">
                @foreach($search as $s)
                <div class="col-lg-3">
                    <div class="manage-sayur-container">
                        <h4 style="text-align: center;">{{ $s->nama }}</h4>
                        <div class="sayur-home-img" style="background-image: url({{ $s->foto() }})"></div>
                        <h5 style="margin-top: 15px; color: #e67e22">Stok: {{ $s->jumlah }}</h5>
                        <h6>Kuantitas: {{ $s->berat }}</h6>
                        <h6>Harga: Rp. {{ $s->harga }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        </div>
    </div>  
@endsection