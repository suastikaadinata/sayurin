@extends('layout')

@section('title', 'Home Sayur')

@section('content')
    <div class="all-header">
        <div class="container">
            <h2 style="margin-left: 20px; margin-top: 20px;">Halaman utama</h2>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a style="color: black;" href="/manage-transaksi">
                        <div class="status-pesanan-container">
                            <img src="{{ asset('img/transaksi-wait.png') }}" style="width: 60px; float: left; margin: 0px 5px 10px 5px;">
                            <h4>{{ $belumdibayar }} Pesanan 
                                <br>
                            belum selesai</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a style="color: black;" href="/manage-transaksi">
                        <div class="status-pesanan-container">
                            <img src="{{ asset('img/success-ok.png') }}" style="width: 60px; float: left; margin: 0px 5px 10px 5px;">
                            <h4>{{ $sukses }} 
                                <br>
                            Transaksi sukses</h4>
                        </div>
                    </a>
                </div>
            </div>
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Sisa sayur yang tersedia pada gudang</h3>
            <div class="row">
                @foreach($sayur as $s)
                <div class="col-lg-3">
                    <a href="/manage-sayur">
                        <div class="sayur-home-container">
                            <h4 style="text-align: center;">{{ $s->nama }}</h4>
                            <div class="sayur-home-img" style="background-image: url({{ $s->foto() }})"></div>
                            <table class="table table-borderless" style="text-align: center; color: #e67e22" >
                                <thead>
                                    <tr>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Kuantitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
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
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Pengguna Aplikasi Mobile</h3>
            <div class="row">
                @foreach($user as $u)
                <div class="col-lg-3">
                    <a href="/manage-user">
                        <div class="user-home-container">
                            <div class="user-home-img" style="background-image: url({{ $u->foto() }})"></div>
                            <hr>
                            <h5 style="margin-top: 15px;">{{ $u->name }}</h5>
                            <hr>
                            <h6 style="margin-top: 15px;">{{ $u->email }}</h6>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection