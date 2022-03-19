<!doctype html>
<html lang="en">
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

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand col-sm-10" href="#">Tacenda</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse .col-6 .col-md-4" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        {{-- <ul class="navbar-nav d-flex justify-content-end"> --}}
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
            <div class="display-3">Pemesanan Kamar</div><br>
            <form action="{{ route('tamu.reservasi') }}" id="myForm" method="POST" DefaultButton="pesan">
                @csrf

                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="tgl_checkin" class="form-control" id="tgl_checkin" value="{{ $request->tgl_checkin }}">
                            <label for="floatingInputGrid">Tanggal Check In</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="tgl_checkout" class="form-control" id="tgl_checkout" value="{{ $request->tgl_checkout }}">
                            <label for="floatingInputGrid">Tanggal Check Out</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" name="jumlah_kamar" class="form-control" id="jumlah_kamar" value="{{ $request->jumlah_kamar }}">
                            <label for="floatingInputGrid">Jumlah Kamar</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row py-2 tmbhdikit">
                    <label for="pemesan" class="col-sm-2 col-form-label">Nama Pemesan</label>
                    <div class="col-sm-10">
                        <input type="text" name="pemesan" class="form-control" id="pemesan" placeholder="Nama Pemesan" value="{{ Auth::user()->name }}">
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" value="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="notelp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telepon">
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="tamu" class="col-sm-2 col-form-label">Nama Tamu</label>
                    <div class="col-sm-10">
                        <input type="text" name="tamu" class="form-control" id="tamu" placeholder="Nama Tamu">
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="tipe_kamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10">
                        <select name="tipe_kamar" id="tipe_kamar" class="form-control">
                            <option selected class="form-select form-check disabled text-muted  " aria-label="disabled select example" disabled>Pilih salah satu tipe kamar</option>
                            <option value="superior">Superior</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row py-2">
                    <div class="col-sm-10 offset-md-2 mt-2">
                        <button type="submit" id="pesan" class="btn btn-lg btn btn-primary panjang mr-12">Pesan</button>
                        <input type="button" onclick="resetForm()" class="btn btn-secondary btn-lg" value="Reset">
                    </div>
                </div>
            </form>
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
    <script>
        function resetForm() {
            document.getElementById("myForm").reset();
            document.getElementById("email").value = "";
            document.getElementById("pemesan").value = "";
            document.getElementById("tgl_checkin").value = "";
            document.getElementById("tgl_checkout").value = "";
            document.getElementById("jumlah_kamar").value = "";
        }

    </script>


</body>
</html>
