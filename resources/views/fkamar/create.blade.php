@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Data Fasilitas Kamar</h2>
            </div>
            <div class="pull-right mt-4 mb-2">
                <a class="btn btn-primary" href="{{ route('fkamar.index') }}">Kembali</a>
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

    <form action="{{ route('fkamar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Fasilitas Kamar :</strong>
                    <input type="text" name="nama_fasilitas" class="form-control" placeholder="cth. Televisi 4inch">
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
                    <label for="gambar">Gambar / Foto :</label>
                    <input type="file" name="gambar" id="gambar" class="form-control-file">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>
@endsection
