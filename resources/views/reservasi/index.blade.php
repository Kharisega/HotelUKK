@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Reservasi Hotel Tacenda</h2>
            </div>
        </div>
        <br><br>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari Nama Tamu / Nama Pemesan ...">
                <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                </datalist>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID Reservasi</th>
            <th>Tanggal Check In</th>
            <th>Tanggal Check Out</th>
            <th>Nama Pemesan</th>
            <th>Nama Tamu</th>
            <th>Jumlah Kamar</th>
            <th>Tipe Kamar</th>
            <th>Nomor Telepon Pemesan</th>
            <th>E-mail</th>
            <th>Aksi</th>
        </tr>
        @foreach ($reservasi as $i => $reservasii)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $reservasii->id_reservasi }}</td>
            <td>{{ $reservasii->tgl_checkin }}</td>
            <td>{{ $reservasii->tgl_checkout }}</td>
            <td>{{ $reservasii->nama_pemesan }}</td>
            <td>{{ $reservasii->nama_tamu }}</td>
            <td>{{ $reservasii->jumlah_kamar }}</td>
            <td>{{ $reservasii->tipe_kamar }}</td>
            <td>{{ $reservasii->notelp_tamu }}</td>
            <td>{{ $reservasii->email }}</td>
            {{-- <td>
                    <form action="{{ route('kamar.destroy', $kamarr->id_kamar) }}" method="POST">
            <a href="{{ route('kamar.edit',$kamarr->id_kamar) }}" class="btn btn-primary">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Hapus</button>

            </form>
            </td> --}}
        </tr>
        @endforeach
    </table>

    {!! $reservasi->links() !!}
</div>
@endsection
