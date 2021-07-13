<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Login</title>
    <style>
        body, html{
            overflow: hidden;
            height: 100%;
        }
    </style>
</head>
<body>
    <section class="row h-100" style="height: 100%">
        <div class="col-6 row" style="background-color: #ECF6FF;">
            <div class="col align-self-center row justify-content-md-center">
                <img src="../img/Illustration_login.png" alt="" class="img-fluid col col-lg-10">
            </div>
        </div>
        <div class="col-6 col align-self-center row justify-content-md-center">
                <form action="{{ route('confirm_reset') }}" method="POST" class="col col-lg-8" style="margin-bottom: 100px;">
                    @csrf
                    <div style="margin-bottom: 100px">
                        <div class="mx-auto" style="width: 80px;">
                            <img src="{{asset('img/logo.png')}}" alt="" width="80px" class="img-fluid">
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3>Reset Password</h3>
                    </div>
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @if(session('errorEmail')) is-invalid @endif" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @if (session('errorEmail'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ session('errorEmail') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password">New Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            {{-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="password">Konfirmasi Password</label>
                            <input id="password" type="password" class="form-control  @if(session('errorPassword')) is-invalid @endif" name="confirmPassword" required autocomplete="current-password">
                            @if (session('errorPassword'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ session('errorPassword') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-main-color">Masuk</button>
                    </div>
                </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
