@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Fasilitas Kamar</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('fkamar.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID Fasilitas Kamar</th>
            <th>Nama Fasilitas Kamar</th>
            <th>Tipe Kamar</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($fkamar as $i => $fkamarr)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $fkamarr->id_fasilitas }}</td>
                <td>{{ $fkamarr->nama_fasilitas }}</td>
                <td>{{ $fkamarr->tipe_kamar }}</td>
                <td><img src="{{url('/fasilitas_kamarkcl/') . '/' . $fkamarr->gambar}}" alt="{{ $fkamarr->gambar }}"></td>
                <td>
                    <form action="{{ route('fkamar.destroy', $fkamarr->id_fasilitas) }}" method="POST">
                        <a href="{{ route('fkamar.edit',$fkamarr->id_fasilitas) }}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach
    </table>

    {!! $fkamar->links() !!}
</div>
@endsection