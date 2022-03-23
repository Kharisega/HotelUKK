@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Fasilitas Hotel</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('fhotel.create') }}" class="btn btn-success">Tambah Data</a>
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
            <th>ID Fasilitas Hotel</th>
            <th>Nama Fasilitas Hotel</th>
            <th>Gambar</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($fhotel as $i => $fhotell)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $fhotell->id_fasilitas }}</td>
                <td>{{ $fhotell->nama_fasilitas }}</td>
                <td><img src="{{url('/fasilitas_hotelkcl/') . '/' . $fhotell->gambar}}" alt="{{ $fhotell->gambar }}"></td>
                <td>{{ $fhotell->keterangan }}</td>
                <td>
                    <form action="{{ route('fhotel.destroy', $fhotell->id_fasilitas) }}" method="POST">
                        <a href="{{ route('fhotel.edit',$fhotell->id_fasilitas) }}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach
    </table>

    {!! $fhotel->links() !!}
</div>
@endsection