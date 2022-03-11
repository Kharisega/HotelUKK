@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Data Kamar</h2>
        </div>
        <div class="pull-right mt-4 mb-2">
            <a class="btn btn-primary" href="{{ route('kamar.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kamar.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kamar :</strong>
                <input type="text" name="nama_kamar" class="form-control" placeholder="cth. Kamar Melati">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipe Kamar :</strong>
                <select name="tipe_kamar" id="tipe_kamar" class="form-control">
                    <option selected class="form-select" aria-label="Disabled select example" disabled>- Pilih Salah Satu -</option>
                    <option value="Superior">Superior</option>
                    <option value="Deluxe">Deluxe</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan :</strong>
                <input type="text" name="keterangan" class="form-control" placeholder="cth. Keadaan Normal">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status :</strong>
                <input type="text" name="status" class="form-control" placeholder="cth. Kosong">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

</form>
</div>
@endsection