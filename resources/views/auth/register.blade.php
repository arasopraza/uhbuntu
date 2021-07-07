@extends('layouts/main')

@section('title', 'Register')
    
<style>
        html, body{
            height: 100%;
            overflow: hidden;
        }
</style>

@section('container')
<body>
    <section class="row h-100" style="height: 100%">
        <div class="col-6 row" style="background-color: #ECF6FF;">            
            <div class="col align-self-center row justify-content-md-center">
                <img src="../img/Illustration_login.png" alt="" class="img-fluid col col-lg-10">
            </div>            
        </div>
        <div class="col-6 col align-self-center row justify-content-md-center">                          
                <form action="{{ route('register') }}" method="POST" class="col col-lg-8" style="margin-bottom: 100px;">                
                    @csrf
                    <div style="margin-bottom: 100px">                         
                        <div class="mx-auto" style="width: 80px;">
                            <img src="../img/logo.png" alt="" width="80px" class="img-fluid">                                                    
                        </div>                                   
                    </div>
                    <div class="mb-4">
                        <h3>Daftar</h3>
                        <small>Sudah Mempunyai akun? <a href="/login">Masuk</a></small>
                    </div>
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Masukkan email kamu" required autocomplete="email" autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan nama kamu" required autocomplete="name">
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password kamu" name="password" required autocomplete="new-password">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Masukkan konfirmasi password kamu" required autocomplete="new-password">
                        </div>
                    </div>                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-main-color">Daftar</button>
                    </div>                
                </form>                    
        </div>
    </section>
</body>
@endsection