<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Tacenda</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('img/logo t.png') }}" type="image/icon type">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        .tmbhdikit {
            margin-top: 25px;
        }

        .btn-block {
            width: 100%;
        }

        .panjang {
            width: 80%;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
</head>
@php
function tgl_indo($tanggal){
$bulan = array (
1 => 'Januari',
'Februari',
'Maret',
'April',
'Mei',
'Juni',
'Juli',
'Agustus',
'September',
'Oktober',
'November',
'Desember'
);
$pecahkan = explode('-', $tanggal);

// variabel pecahkan 0 = tahun
// variabel pecahkan 1 = bulan
// variabel pecahkan 2 = tanggal

return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
@endphp
<body onload="window.print()" onafterprint="window.close()">
    <div class="container marketing">
        <div class="display-4">Bukti Reservasi Kamar</div><br>
        <hr style="margin-bottom: 25px; margin-top:-15px">
        <div class="row g-2">
            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="pemesan" class="col-form-label">ID Reservasi</label>
                </div>
                <div class="col-sm-1">
                    <label for="pemesan" class="col-form-label">:</label>
                </div>
                <div class="col-sm-6">
                    <label for="pemesan" class="col-form-label">{{ $cetak[0]->id_reservasi }}</label>
                </div>
            </div>
            <div class="row g-2">
                <div class="form-group row" style="margin-top:-15px;">
                    <div class="col-sm-2">
                        <label for="pemesan" class="col-form-label">Nama Pemesan</label>
                    </div>
                    <div class="col-sm-1">
                        <label for="pemesan" class="col-form-label">:</label>
                    </div>
                    <div class="col-sm-6">
                        <label for="pemesan" class="col-form-label">{{ $cetak[0]->nama_pemesan }}</label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="form-group row" style="margin-top:-15px;">
                        <div class="col-sm-2">
                            <label for="pemesan" class="col-form-label">Nama Tamu</label>
                        </div>
                        <div class="col-sm-1">
                            <label for="pemesan" class="col-form-label">:</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="pemesan" class="col-form-label">{{ $cetak[0]->nama_tamu }}</label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group row" style="margin-top:-15px;">
                            <div class="col-sm-2">
                                <label for="pemesan" class="col-form-label">E-Mail</label>
                            </div>
                            <div class="col-sm-1">
                                <label for="pemesan" class="col-form-label">:</label>
                            </div>
                            <div class="col-sm-6">
                                <label for="pemesan" class="col-form-label">{{ $cetak[0]->email }}</label>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="form-group row" style="margin-top:-15px;">
                                <div class="col-sm-2">
                                    <label for="pemesan" class="col-form-label">Nomor Telepon</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="pemesan" class="col-form-label">:</label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="pemesan" class="col-form-label">{{ $cetak[0]->notelp_tamu }}</label>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:-6px;">
                                <div class="col-sm-2">
                                    <label for="pemesan" class="col-form-label">Tanggal Check-In</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="pemesan" class="col-form-label">:</label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="pemesan" class="col-form-label">{{ tgl_indo($cetak[0]->tgl_checkin) }}</label>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:-6px;">
                                <div class="col-sm-2">
                                    <label for="pemesan" class="col-form-label">Tanggal Check-Out</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="pemesan" class="col-form-label">:</label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="pemesan" class="col-form-label">{{ tgl_indo($cetak[0]->tgl_checkout) }}</label>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:-6px;">
                                <div class="col-sm-2">
                                    <label for="pemesan" class="col-form-label">Jumlah Kamar</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="pemesan" class="col-form-label">:</label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="pemesan" class="col-form-label">{{ $cetak[0]->jumlah_kamar }}</label>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:-6px;">
                                <div class="col-sm-2">
                                    <label for="pemesan" class="col-form-label">Tipe Kamar</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="pemesan" class="col-form-label">:</label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="pemesan" class="col-form-label">{{ $cetak[0]->tipe_kamar }}</label>
                                </div>
                            </div>

                            <hr style="margin-bottom: 15px;">
                        </div>


                        <!-- FOOTER -->
                        <footer class="container">
                            {{-- <div class="float-end"><a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
                        <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                    </svg>
                </a></div> --}}
                            {{-- <a href="#"><i class="fa-duotone fa-up-from-bracket"></i></a> --}}
                            <p>&copy; 2021-2022 Tacenda Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
                        </footer>
                        </main>


                        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
                        {{-- <script type="text/javascript">
                            window.print();
                            window.close();
                        </script> --}}


</body>
</html>
