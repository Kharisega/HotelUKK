@extends('dashboard')

@section('content')
@include('sweetalert::alert')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Reservasi Hotel Tacenda</h2><br>
            </div>
        </div>
        <br><br>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('reservasi.cari3') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_tamu" class="form-control" id="nama_tamu" style="width: 300px">
                                <label for="floatingInputGrid">Cari Nama Tamu / Nama Pemesan</label>
                                {{-- <a href="{{ route('reservasi.index') }}" class="btn btn-outline-secondary fs-5" style="padding-top:12px;width: 100px; height: 58px;">Semua</a>
                                <button type="submit" class="btn btn-outline-secondary fs-5" style="width: 100px; height: 58px;">Cari</button> --}}
                            </div>

                        {{-- </form> --}}
                        {{-- <input type="text" class="form-control" name="cari" id="cari" placeholder="Cari Nama Pemesan / Nama Tamu" required> --}}
                    </div>
                    {{-- <div class="col">
                        <a href="{{ route('reservasi.index') }}" class="btn btn-outline-primary fs-5" style="padding-top:12px;width: 100px; height: 58px;">Semua</a>
                    <button type="submit" class="btn btn-outline-primary fs-5" style="width: 100px; height: 58px;">Cari</button>
                </div> --}}
                <div class="col">
                    {{-- <form action="{{ route('reservasi.filter') }}" method="POST">
                        @csrf --}}
                        <div class="form-floating mb-3">
                            <input type="date" name="tgl_checkin" class="form-control" id="tgl_checkin"  style="width: 300px">
                            <label for="floatingInputGrid">Tanggal Check In</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <a href="{{ route('reservasi.cari2') }}" class="btn btn-outline-secondary fs-5" style="padding-top:13px; width: 100px; height:58px;">Semua</a>
                            <button type="submit" class="btn btn-outline-secondary fs-5" style="padding-top:7px; width: 100px; height:58px;">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
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
        <td>
            <form action="{{ route('reservasi.destroy', $reservasii->id_reservasi) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-outline-success">Checkout</button>

            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $reservasi->links() !!}
</div>
@endsection
