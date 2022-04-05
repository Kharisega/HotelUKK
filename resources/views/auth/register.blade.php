<!doctype html>
<html lang="en">
<head>
    <title>Tacenda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('img/logo t.png') }}" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">


</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap">
                    <h3 class="text-center mb-4">Daftar</h3>
                    <form method="POST" action="{{ route('register') }}" class="signup-form">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Username" autocomplete="name" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail Address">
                        </div>
                        <div class="form-group mb-3">
                            <input id="password-field" name="password" type="password" class="form-control" placeholder="Password">
                            {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
                        </div>
                        <div class="form-group mb-3">
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                            {{-- <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Daftar</button>
                        </div>
                    </form>
                    <p>Sudah punya akun! <a data-toggle="tab" href="{{ route('login') }}">Masuk</a></p>
                    <p><a data-toggle="tab" href="{{ route('welcome') }}">&#8592; Kembalip</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
