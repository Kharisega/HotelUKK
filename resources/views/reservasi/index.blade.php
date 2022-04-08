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
                        <form action="{{ route('reservasi.cari') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_tamu" class="form-control" id="nama_tamu" style="width: 300px">
                                <label for="floatingInputGrid">Cari Nama Tamu / Nama Pemesan</label>
                            </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="date" name="tgl_checkin" class="form-control" id="tgl_checkin" style="width: 300px">
                            <label for="floatingInputGrid">Tanggal Check In</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <a href="{{ route('reservasi.index') }}" class="btn btn-outline-secondary fs-5" style="padding-top:13px; width: 100px; height:58px;">Semua</a>
                            <button type="submit" class="btn btn-outline-secondary fs-5" style="padding-top:7px; width: 100px; height:58px;">Cari</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-sm table-hover table-striped table-responsive">
        <thead class="thead-dark">
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
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
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
            @if( $reservasii->status == 'checkin' )
            <td>Belum Check-In</td>
            <td>
                <form action="{{ route('reservasi.batal', $reservasii->id_reservasi) }}" method="POST">
                    <a href="{{ route('reservasi.checkin',$reservasii->id_reservasi) }}" class="btn btn-outline-success">CheckIn</a>

                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Batal</button>

                </form>
            </td>
            @elseif( $reservasii->status == 'checkout' )
            <td>Sudah Check-In</td>
            <td>
                <form action="{{ route('reservasi.batal', $reservasii->id_reservasi) }}" method="POST">
                    <a href="{{ route('reservasi.checkout',$reservasii->id_reservasi) }}" class="btn btn-outline-warning">CheckOut</a>

                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Batal</button>

                </form>
            </td>
            @elseif ( $reservasii->status == 'selesai' )
            <td>Pesanan sudah selesai</td>
            <td></td>
            @else
            <td>Pesanan dibatalkan</td>
            <td></td>
            @endif
            {{-- <td>
                <form action="{{ route('reservasi.destroy', $reservasii->id_reservasi) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-success">Checkout</button>

                </form>
            </td> --}}
        </tr>
        @endforeach
    </table>

    {!! $reservasi->links() !!}
</div>
@endsection
