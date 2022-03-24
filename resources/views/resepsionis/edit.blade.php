@extends('dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Resepsionis</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('resepsionis.index') }}">Kembali</a>
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

    <form action="{{ route('resepsionis.update', $resepsionis[0]->model_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username :</strong>
                    <input type="text" name="name" class="form-control" value="{{ $resepsionis[0]->name }}" placeholder="cth. Televisi 4inch">
                </div>
            </div>
            <input type="hidden" name="model_id" value="{{ $resepsionis[0]->model_id }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>E-mail :</strong>
                    <input type="text" name="email" class="form-control" value="{{ $resepsionis[0]->email }}" placeholder="cth. Televisi 4inch">
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password :</strong>
                <input type="text" name="password" class="form-control" value="{{ $admin[0]->password }}" placeholder="cth. Televisi 4inch">
        </div>
</div> --}}
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Edit</button>
</div>
</div>

</form>
</div>
@endsection
