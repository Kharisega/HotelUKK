@extends('dashboard')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Data Kamar</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kamar.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Edit Gagal</strong> Data yang anda inputkan bermasalah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kamar.update', $kamar->id_kamar) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Tipe Kamar :</strong>
            <select name="tipe_kamar" class="form-control" id="jk">
                <option selected class="form-select" aria-label="Disabled select example" disabled>- Pilih Salah Satu -</option>
                <option value="Superior" @if($kamar->tipe_kamar == 'Superior') selected @endif>Superior</option>
                <option value="Deluxe" @if($kamar->tipe_kamar == 'Deluxe') selected @endif>Deluxe</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Kamar yang tersedia :</strong>
                <input type="number" name="jumlah_kamar" class="form-control" value="{{ $kamar->jumlah_kamar}}" placeholder="cth. Keadaan Normal">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar :</strong>
                <input type="file" name="gambar" class="form-control-file">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>

</form>
</div>
@endsection