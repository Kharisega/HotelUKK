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
        .btn-block {
            width: 100%;
        }

        .offset-wae {
            margin-left: 82.333%;
            width: 18%;
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

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> --}}
                    <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('img/hotel2.jpg') }}" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Be Yourself</h1>
                            <p>There's no one better.</p>
                            <a><a class="btn btn-lg btn-primary" href="{{ route('register') }}">Daftar Sekarang!</a></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> --}}
                    <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('img/hotel3.jpg') }}" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>We travel not to escape life,</h1>
                            <p>But for life not to escape us.</p>
                            {{-- <a><a class="btn btn-lg btn-primary" href="#">Learn more</a></a> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> --}}
                    <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('img/hotel1.jpg') }}" alt="">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Only you can change your life.</h1>
                            <p>Nobody else can do it for you.</p>
                            {{-- <a><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container marketing">
            <form action="{{ route('tamu.pesan') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="tgl_checkin" class="form-control" id="floatingInputGrid">
                            <label for="floatingInputGrid">Tanggal Check In</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="tgl_checkout" class="form-control" id="floatingInputGrid">
                            <label for="floatingInputGrid">Tanggal Check Out</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" name="jumlah_kamar" class="form-control" id="floatingInputGrid">
                            <label for="floatingInputGrid">Jumlah Kamar</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block" style="height:58px;">Pesan</button>
                    </div>
                </div>
            </form>

            <hr class="featurette-divider">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    {{-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> --}}
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{ asset('img/ramah.jpg') }}" alt="">

                    <h2>Ramah</h2>
                    <p>Pelayanan yang ramah dari para pegawai kami, membuat anda nyaman untuk selalu mengandalkan kami.</p><br>
                    {{-- <a><a class="btn btn-secondary" href="#">View details &raquo;</a></a> --}}
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    {{-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> --}}
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{ asset('img/lengkap.jpg') }}" alt="">

                    <h2>Lengkap</h2>
                    <p>Fasilitas yang kami sediakan untuk para tamu juga sangat lengkap, baik fasilitas tiap kamar maupun fasilitas hotel.</p><br>
                    <a><a class="btn btn-secondary" href="#">Lihat Selengkapnya &raquo;</a></a>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    {{-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> --}}
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{ asset('img/terjangkau.jpg') }}" alt="">

                    <h2>Terjangkau</h2>
                    <p>Kami juga memberikan harga yang terjangkau agar semua kalangan dapat menikmati pelayanan dan fasilitas kami.</p><br>
                    {{-- <a><a class="btn btn-secondary" href="#">View details &raquo;</a></a> --}}
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Tentang <span class="text-muted">Hotel Tacenda</span></h2>
                    <p class="lead">Hotel Tacenda merupakan salah satu hotel terbaik dan menjadi rekomendasi ketika berlibur. Dengan menyediakan berbagai fasilitas yang dibutuhkan oleh para pengunjung dan juga kami memberikan pelayanan yang terbaik untuk meningkatkan pengalaman pengunjung ketika berlibur. Bermula dari hotel sederhana dengan pesan secara langsung di tempat, hotel kami sekarang membuka pemesanan kamar dengan lebih mudah dan simpel melalui website kami ini</p>
                </div>
                <div class="col-md-5">
                    {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> --}}
                    <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('img/ttgkami.jpg') }}" alt="">
                </div>
                <div class="col-md-4">
                    <a><a class="btn btn-secondary" href="#">Lihat Selengkapnya &raquo;</a></a>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Tipe Kamar <span class="text-muted"> Superior</span></h2>
                    <p class="lead">Di Kamar tipe Superior kami berikan berbagai fasilitas diantaranya, Kamar berukuran luas 32 m<sup>2</sup>, 1 kamar mandi dengan shower, Coffee Maker beserta beberapa kopi dan gula pilihan, 1 buah Air Conditioner, dan LED TV dengan lebar 32 inch.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> --}}
                    <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('img/superior.jpg') }}" alt="">
                </div>
                <div class="col-md-2 order-md-2 offset-wae">
                    <a><a class="btn btn-secondary" href="#">Lihat Selengkapnya &raquo;</a></a>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Tipe Kamar <span class="text-muted">Deluxe</span></h2>
                    <p class="lead">Di Kamar tipe Deluxe kami berikan berbagai fasilitas diantaranya, Kamar berukuran luas 45 m<sup>2</sup>, 1 kamar mandi dengan shower dan Bath Tub, Coffee Maker beserta beberapa kopi dan gula pilihan,1 buah Sofa panjang, 1 buah Air Conditioner, dan LED TV dengan lebar 40 inch.</p>
                </div>
                <div class="col-md-5">
                    {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> --}}
                    <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('img/deluxe.jpg') }}" alt="">
                </div>
                <div class="col-md-4">
                    <a><a class="btn btn-secondary" href="#">Lihat Selengkapnya &raquo;</a></a>
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <div class="float-end"><a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
                        <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                    </svg>
                </a></div>
            {{-- <a href="#"><i class="fa-duotone fa-up-from-bracket"></i></a> --}}
            <p>&copy; 2021-2022 Tacenda Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


</body>
</html>
