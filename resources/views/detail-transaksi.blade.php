@extends('layout')

@section('title', 'Tambah Sayur')

@section('content')
    <div style="margin-bottom: 20px;" class="all-header">
        <div class="container">
           <h1>Detail Transaksi</h1>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <table class="table " style="text-align: left; color: #53B666; border: none!important;" >
                <thead class="table-success">
                    <tr>
                        <th scope="col">{{ $transaksi[0]->name }}</th>
                        <th scope="col">{{ $transaksi[0]->updated_at }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold;">{{ $transaksi[0]->nomor_telepon }}</td>
                        <td style="font-weight: bold">{{ $transaksi[0]->email }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">{{ $transaksi[0]->alamat }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Note: {{ $transaksi[0]->note_alamat }}</td>
                    </tr>
                </tfoot>
            </table>
            <div class="col-lg-3">
                <h3>Pesanan</h3>
            </div>
            <table style="text-align: center;" class="table table-bordered table-light table-striped">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Sayur</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody >
                @foreach($transaksi as $t)
                    <tr>
                        <td>{{ $t->nama }}</td>
                        <td>{{ $t->jumlah }}</td>
                        <td>{{ $t->total_harga }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                    <td scope="">{{ $totalHarga }}</td>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-lg-5">
                    <span style="font-weight: bold;">Metode pembayaran : </span>
                    <span>On the spot</span>
                </div>
                <div class="col-lg-7">
                    @if($transaksi[0]->status_transaksi == 0)
                        <span style="font-weight: bold;">Status Transaksi : </span>
                        <span>Belum dibayar</span>
                    @endif
                    @if($transaksi[0]->status_transaksi == 1)
                        <span style="font-weight: bold;">Status Transaksi : </span>
                        <span>Belum dikirim</span>
                    @endif
                    @if($transaksi[0]->status_transaksi == 2)
                        <span style="font-weight: bold;">Status Transaksi : </span>
                        <span>Sukses</span>
                    @endif
                </div>
                {{-- <div class="col-lg-5">
                    <form method="POST" rule="form" action="">
                        {{ csrf_field() }}
                        <select class="col-sm-8 custom-select">
                            <option selected value="">Status Pengiriman</option>
                            <option value="">Menunggu Pembayaran</option>
                            <option value="">Sedang Dikirim</option>
                            <option value="">Terkirim</option>
                        </select>
                        <button type="submit" class="btn btn-default btn-lg btn-modif" style="text-align: center;">
                            simpan
                        </button>
                    </form>
                </div> --}}
            </div>      
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog" style="position: fixed; top: 50%;left: 50%;
  transform: translate(-50%, -50%);
">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>anda yakin ingin menghapus -SAYUR</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Yakin</button>
          <button type="button" class="btn btn-default btn-warning" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection