@extends('dashboard')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Data Fasilitas Kamar</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('fkamar.index') }}">Kembali</a>
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

<form action="{{ route('fkamar.update', $fkamar->id_fasilitas) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Fasilitas Kamar :</strong>
                <input type="text" name="nama_fasilitas" class="form-control" value="{{ $fkamar->nama_fasilitas }}" placeholder="cth. Televisi 4inch">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Tipe Kamar :</strong>
            <select name="tipe_kamar" class="form-control" id="jk">
                <option selected class="form-select" aria-label="Disabled select example" disabled>- Pilih Salah Satu -</option>
                <option value="Superior" @if($fkamar->tipe_kamar == 'Superior') selected @endif>Superior</option>
                <option value="Deluxe" @if($fkamar->tipe_kamar == 'Deluxe') selected @endif>Deluxe</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>

</form>
</div>
@endsection