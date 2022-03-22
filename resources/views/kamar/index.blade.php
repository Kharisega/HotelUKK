@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Kamar</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('kamar.create') }}" class="btn btn-success">Tambah Data</a>
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
            <th>ID Kamar</th>
            <th>Tipe Kamar</th>
            <th>Jumlah Kamar</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($kamar as $i => $kamarr)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kamarr->id_kamar }}</td>
                <td>{{ $kamarr->tipe_kamar }}</td>
                <td>{{ $kamarr->jumlah_kamar }}</td>
                <td>{{ $kamarr->gambar }}</td>
                <td>
                    <form action="{{ route('kamar.destroy', $kamarr->id_kamar) }}" method="POST">
                        <a href="{{ route('kamar.edit',$kamarr->id_kamar) }}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach
    </table>

    {!! $kamar->links() !!}
</div>
@endsection