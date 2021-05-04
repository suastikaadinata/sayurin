@extends('layout')

@section('title', 'Tambah Sayur')

@section('content')
    <div style="margin-bottom: 20px;" class="all-header">
        <div class="container">
           <h1>Tambah Sayur</h1>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <form rule="form" method="POST" enctype="multipart/form-data" action="/manage-sayur/tambah-sayur/tambah">
                {{ csrf_field() }}
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="image-place-upload"></div>
                        <label class="btn btn-default btn-lg btn-modif image-upload-btn">
                            <input class="input-image" type="file" multiple id="uploadPhotoSayur" name="gambar-sayur">
                            <div id="text-upload"></div>

                            @if ($errors->has('gambar-sayur'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gambar-sayur') }}</strong>
                                </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-lg-5">  
                        <h4>Nama Sayur</h4>
                        <div class="form-group form{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <input id="nama" type="text" class="form-control input-lg" required autofocus placeholder="Nama Sayur" name="nama"
                            >

                            @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                            
                        <h4>Harga Sayur</h4>
                        <div class="form-group form{{ $errors->has('harga') ? ' has-error' : '' }}">
                            <input id="harga" type="number" class="form-control input-lg" required autofocus placeholder="0" name="harga"
                            >
                                
                            @if ($errors->has('harga'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('harga') }}</strong>
                                </span>
                            @endif
                        </div>

                        <h4>Stok Sayur</h4>
                        <div class="form-group form{{ $errors->has('stok') ? ' has-error' : '' }}">
                            <input id="stok" type="number" class="form-control input-lg" required placeholder="0" 
                                name="stok" >
                            
                            @if ($errors->has('stok'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('stok') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4>Kuantitas Sayur</h4>
                            <div class="form-group form{{ $errors->has('jeniskuantitas') ? ' has-error' : '' }}">
                               <select id="jeniskuantitas" class="form-control input-lg" name="jeniskuantitas">
                                    <option selected value="" disabled>Pilih Kuantitas</option>
                                    <option value="Gram">Gram</option>
                                    <option value="Ikat">Ikat</option>
                                    <option value="Biji">Biji</option>
                               </select>
    
                            @if ($errors->has('jeniskuantitas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jeniskuantitas') }}</strong>
                                </span>
                            @endif
                        </div>

                        <h4>Jumlah Kuantitas Sayur</h4>
                        <div class="form-group form{{ $errors->has('kuantitas') ? ' has-error' : '' }}">
                            <input id="kuantitas" type="number" class="form-control input-lg" required placeholder="0" 
                                name="kuantitas" >
                            
                            @if ($errors->has('kuantitas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kuantitas') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-default btn-lg btn-modif btn-tambah-sayur">
                            Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if(session()->has('addSayur'))
            <input type="hidden" id="addSayur" value="1">
        @else
            <input type="hidden" id="addSayur" value="0">
        @endif
    </div>
    <div id="modal-add-sayur" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="text-align: center;" class="modal-title">Pemberitahuan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Data sayur anda berhasil ditambahkan</p>
                </div>
                <div style="text-align: center;" class="modal-footer">      
                    <button type="button" class="btn btn-primary btn-modif" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
@endsection