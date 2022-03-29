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
<body>
@include('sweetalert::alert')
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand col-sm-9" href="{{ route('tamu') }}">Tacenda</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse .col-6 .col-md-4" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        {{-- <ul class="navbar-nav d-flex justify-content-end"> --}}
                        <li class="nav-item">
                            <a href="{{ route('tamu') }}" class="nav-link">{{ __('Beranda') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tamu.pesanan') }}" class="nav-link">{{ __('Pesanan') }}</a>
                        </li>
                        @if (Route::has('login'))
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        @endif
                    </ul>
                    {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
                </div>
            </div>
        </nav>
    </header>

    <main>
        <br>
        <div class="container marketing">
            <div class="display-3">Bukti Reservasi</div><br>
            <div class="display-7">Customer dengan E-mail {{ Auth::user()->email }}</div><br>
            <table class="table table-light table-striped align-middle">
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Tanggal Check-In</th>
                    <th>Tanggal Check-Out</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($pesanan as $i => $pesanann)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $pesanann->nama_tamu }}</td>
                    <td>{{ $pesanann->tgl_checkin }}</td>
                    <td>{{ $pesanann->tgl_checkout }}</td>
                    <td>
                        <div class="row">
                            <div class="col col-sm-3">    
                        <form action="{{ route('tamu.cetak', $pesanann->id_reservasi) }}" method="POST"  target="_blank">
                            @csrf
                            <button type="submit" class="btn btn-warning">Cetak</button>
                        </form>
                            </div>
                            <div class="col">
                        <form action="{{ route('tamu.destroy', $pesanann->id_reservasi) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Batal Pesanan</button>
                        </form>
                            </div>
                        </div>
                        {{-- <button type="submit" class="btn btn-warning">Cetak</button> --}}
                    </td>
                </tr>
                @endforeach
            </table>

            <hr class="featurette-divider">
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



</body>
</html>
