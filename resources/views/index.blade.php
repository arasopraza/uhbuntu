@extends('layouts/main')

@section('title', 'Home')
    
<style>
    html, body{
        height: 100%;
        overflow: hidden;
    }
</style>

@section('container')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="../img/logo.png" alt="" width="80px" class="img-fluid">                                                    
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>          
          <div class="mx-auto" style="width: 382px">
            <div class="collapse navbar-collapse w-100" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Pertanyaan terbaru</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Upvote</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Downvote</a>
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
                        <img src="../img/avatar.png" alt="" class="img-fluid \" width="30px">
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
      <header class="bg-color-header position-relative">
        <div class="text-header text-center position-absolute top-50 start-50 translate-middle">
          <p>Temukan jawabanmu terkait</p>
          <p>Dunia Digital</p>
        </div>
        <div class="d-flex justify-content-between">
          <div class="">
            <div class="bg-header1"></div>          
          </div>                  
          <div class="">
            <div class="bg-header2"></div>          
          </div>          
        </div>          
          <!-- <img src="/img/Frame_index.png" alt="" class="img-fluid" width="100%"> -->
      </header>
      <section class="bg-index" style="min-height: 100%">
          <div class="container">
            <form action="" class="row pt-3 pb-3">                               
                <div class="col-md-9">                  
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" style="border: 0; background-color: #fff;" id="basic-addon1"><i class="icon-search"></i></span>
                        <input type="text" class="form-control border-0 search-jawaban" placeholder="Cari jawabanmu disini">
                      </div>
                  </div>
                  <div class="col-md-3 d-grid">
                    <button type="button" class="btn btn-lg btn-main-color btn-jawaban" data-bs-toggle="modal" data-bs-target="#modalPertanyaan">Tulis pertanyaanmu</button>
                  </div>                                          
            </form>
            
            <div class="card border-0 mb-3">
                <div class="row g-0 m-3">
                  <div class="col-md-2 my-auto mx-auto">
                      <ul>
                          <li class="d-flex my-2">
                              <div>
                                <img src="img/icon/icon_dipilih.svg" alt="" class="img-fluid">
                              </div>                            
                              <div class="ms-3 mt-1 mb-1">                                  
                                  <p class="m-0 my-auto">0 Dipilih</p>
                              </div>
                          </li>
                          <li class="d-flex my-2">
                            <div>
                              <img src="img/icon/icon_jawab.svg" alt="" class="img-fluid">
                            </div>                            
                            <div class="ms-3 mt-1 mb-1">                                
                                <p class="m-0 my-auto">0 Jawaban</p>
                            </div>
                        </li>
                        <li class="d-flex my-2">
                            <div>
                              <img src="img/icon/icon_mata.svg" alt="" class="img-fluid">
                            </div>                            
                            <div class="ms-3 mt-1 mb-1">                                
                                <p class="m-0 my-auto">5 Dilihat</p>
                            </div>
                        </li>
                      </ul>                    
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>                      
                    </div>                    
                  </div>
                  <div class="col-md-2 my-auto">                      
                      <div class="text-center">                          
                        <a href="" class="fw-bolder main-color">Tampilkan</a>                      
                      </div>                     
                    </div>
                </div>
              </div>
          </div>                    
        </div>        
      </section>

      <div class="modal fade" id="modalPertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">                          
              <div class="row justify-content-end m-2">                
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                       
              </div>              
            <div class="modal-body" style="padding-top: 0;">
                <form action="">
                    <div class="text-center mb-5">
                        <h3>Pertanyaan</h3>
                    </div>
                    <div class="container">
                        <div class="mb-5">                            
                            <div class="mb-3">
                                <label for="" class="mb-2">Judul Pertanyaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan judul pertanyaanmu disini">
                            </div>                    
                            <div class="mb-3">
                                <label for="" class="mb-2">Penjelasan Pertanyaan</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan penjelasan pertanyaanmu disini"></textarea>
                            </div>                    
                            <div class="mb-3">
                                <label for="" class="mb-2">Tag</label>
                                <input type="text" class="form-control tagin" data-placeholder="Masukkan tag pertanyaanmu disini (maksimal 5 tags)">
                            </div>                    
                        </div>                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-main-color">Submit</button>
                        </div>  
                    </div>                  
                </form>            
            </div>
            <div class="modal-footer" style="border: none;">
              
            </div>
          </div>
        </div>
      </div>      

      <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">                          
              <div class="row justify-content-end m-2">                
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                       
              </div>              
            <div class="modal-body" style="padding-top: 0;">
              <div class="container">
                <div class="text-center mb-5">
                  <img src="../img/robot.png" alt="" class="img-fluid">
                  <h4>Apakah kamu yakin keluar
                    dari halaman?</h4>
              </div>   
              </div>              
            </div>
            <div class="modal-footer" style="border: none;">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mx-auto d-flex justify-content-between mb-5">                                                                
                @csrf
                <div class="d-grid mx-2">
                  <button type="button" class="btn btn-lg btn-outline-main-color px-5" data-bs-dismiss="modal">Batal</button>                                  
                </div>
                <div class="d-grid mx-2">
                  <button type="submit" class="btn btn-lg btn-keluar px-5">Keluar</button>
                </div>                                  
              </form>                
            </div>
          </div>
        </div>
      </div> 

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
                              <h5>Wiliam Thunder</h5>                              
                            </div>                                                                                     
                            <div class="mb-3 row">
                              <div class="col-6 mb-3">
                                <label for="" class="mb-2">Nama Depan</label>
                                <input type="text" class="form-control" value="Wiliam" placeholder="Masukkan Nama Depan">
                              </div>           
                              <div class="col-6 mb-3">
                                <label for="" class="mb-2">Nama Belakang</label>
                                <input type="text" class="form-control" value="Thunder" placeholder="Masukkan Nama Belakang">
                              </div>                                
                              <div class="col-6 mb-3">
                                <label for="" class="mb-2">Email</label>
                                <input type="Email" class="form-control" value="wiliamthunder@gmail.com" placeholder="Masukkan Email">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/tagin.js"></script>
    <script>        
        const tags = $('.tagin')[0]  
        tagin(tags)

        $('#upload_profile').change((e) => {          
          $('#preview_image').attr('src', URL.createObjectURL($(e)[0].target.files[0]))          
        })
    </script>
</body>
@endsection