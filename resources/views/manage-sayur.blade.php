@extends('layout')

@section('title', 'Menejemen Sayur')

@section('content')
    <div style="margin-bottom: 20px;" class="all-header">
        <div class="container">
            <div class="row">
                <div style="margin-bottom: 20px;"class="col-lg-6">
                    <h2 style=" padding-top: 20px;">Menejemen sayur</h2>
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
            <div class="row">
                @foreach($sayur as $s)
                <div class="col-lg-3">
                    <div class="manage-sayur-container">
                        <a href="/manage-sayur/detail-sayur/{{ $s->id }}" style="text-decoration: none;" >
                        <h4 style="text-align: center; color: #e67e22">{{ $s->nama }}</h4>
                        <div class="sayur-home-img" style="background-image: url({{ $s->foto() }})"></div>
                        <table class="table" style="text-align: center; color: #e67e22" >
                            <thead >
                                <tr>
                                    <th>Stok</th>
                                    <th>Kuantitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $s->jumlah }}</td>
                                    <td>{{ $s->berat }} {{ $s->kuantitas }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Rp. {{ $s->harga }} ,-</td>
                                </tr>
                            </tfoot>

                        </table>
                        </a>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>  
    <script>
        $('#manage-sayur-txt').css('color', '#ffc87b');
    </script>
@endsection