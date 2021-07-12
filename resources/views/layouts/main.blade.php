<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/tagin.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/trumbowyg.min.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="{{ route('index') }}">
            <img src="../img/logo.png" alt="" width="80px" class="img-fluid">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="mx-auto" style="width: 382px">
            <div class="collapse navbar-collapse w-100" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Pertanyaan terbaru</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('upvote') }}">Upvote</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('downvote') }}">Downvote</a>
                  </li>
                </ul>
              </div>
          </div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  @guest
                      <a class="nav-link" href="/login" id="navbarDropdownMenuLink" role="button">
                        Login
                      </a>
                  @else
                    <div class="d-flex">
                      <div class="my-auto avatar-crop rounded-circle bg-color-user text-center">
                        <img src="../img/avatar.png" alt="" class="img-fluid" width="30px">
                    </div>
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalProfile">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#modalLogout">Keluar</a></li>
                      </ul>
                    </div>
                  @endguest
                </li>
            </ul>
        </div>
      </nav>
    @yield('container')
    <div class="modal fade" id="modalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="row justify-content-end m-2">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body" style="padding-top: 0;">
                <form action="">
                    <div class="text-center mb-3">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="container">
                        <div class="mb-5">
                            <div class="mx-auto text-center mb-5" style="width: 190px">
                              <div class="rounded bg-color-user mb-2">
                              <div class="w-100">
                                <label for="upload_profile" class="d-flex justify-content-end">
                                  <img src="../img/icon/icon_edit.svg" alt="" class="image-fluid btn-edit-profile">
                                </label>
                                <input type="file" name="" id="upload_profile" class="edit-file-profile">
                              </div>
                              <div class="auto-crop">
                                <img src="../img/avatar.png" id="preview_image" alt="" class="img-fluid">
                              </div>
                            </div>
                              {{-- <h5>{{ Auth::user()->name }}</h5> --}}
                            </div>
                            <div class="mb-3 row">
                              <div class="col-6 mb-3">
                                <label for="" class="mb-2">Nama Depan</label>
                                <input type="text" class="form-control" value="" placeholder="Masukkan Nama Depan">
                              </div>
                              <div class="col-6 mb-3">
                                <label for="" class="mb-2">Nama Belakang</label>
                                <input type="text" class="form-control" value="" placeholder="Masukkan Nama Belakang">
                              </div>
                              <div class="col-6 mb-3">
                                <label for="" class="mb-2">Email</label>
                                <input type="Email" class="form-control" value="" placeholder="Masukkan Email">
                              </div>
                              <div class="col-6 mb-3">
                                <label for="" class="mb-2">Kata Sandi</label>
                                <input type="text" class="form-control" value="" placeholder="Masukkan Kata sandi">
                              </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-main-color">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border: none;">
            </div>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/trumbowyg.min.js')}}"></script>
    <script src="{{asset('js/tagin.js')}}"></script>
    @stack('scripts')
</body>
</html>
