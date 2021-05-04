@extends('layout')

@section('title', 'Tambah Sayur')

@section('content')
    <div style="margin-bottom: 20px;" class="all-header">
        <div class="container">
           <h1>Detail Sayur</h1>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sayur-home-img" style="background-image: url({{ $sayur->foto() }})"></div>
                    </div>
                    <div class="col-lg-5">  
                        <h4>Nama Sayur</h4>
                        <div>
                            <h5 style="color: #e67e22" >{{ $sayur->nama }}</h5>
                        </div>
                            
                        <h4>Harga Sayur</h4>
                        <div>
                            <h5 style="color: #e67e22">{{ $sayur->harga }}</h5>
                        </div>

                        <h4>Stok Sayur</h4>
                        <div>
                            <h5 style="color: #e67e22">{{ $sayur->jumlah }}</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4>Kuantitas Sayur</h4>
                        <div>
                            <h5 style="color: #e67e22"  >{{ $sayur->berat }} Ikat</h5>
                        </div>
                        <button onclick="window.location.href='/manage-sayur/edit-sayur/{{ $sayur->id }}'" class="btn btn-default btn-lg btn-modif btn-tambah-sayur">
                            Edit
                        </button>
                        <button id="hapus-sayur-btn" data-id="{{ $sayur->id }}" style="margin-top: 10px;" class="btn btn-default btn-lg btn-modif-hapus" data-toggle="modal" data-target="#myModal">
                            Hapus
                        </button>
                    </div>
                </div>
        </div>
    </div>
    <div class="hapus-sayur modal fade" id="myModal" role="dialog" style="position: fixed; top: 50%;left: 50%; transform: translate(-50%, -50%);">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p>anda yakin ingin menghapus {{ $sayur->nama }}</p>
                </div>
                <div class="modal-footer">
                    <form data-url="{{ url('/manage-sayur/delete') }}" method="POST" action="">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default">
                            Yakin
                        </button>
                        <button type="button" class="btn btn-default btn-warning" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection