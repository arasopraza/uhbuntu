@extends('layouts/main')

@section('title', 'Uhbuntu')

@section('container')
      <section class="bg-index pt-3" style="min-height: 100%">
          <div class="container">
            <div class="row">
              <div class="col-2">
                <div class="bg-robot-detail img-robot-detail h-100">
                  <div class="row h-100">
                    <div class="col-12">
                      <button class="btn btn-back d-flex mx-auto mt-5"><i class="icon-arrow-left"></i>Kembali</button>
                    </div>
                    <div class="col-12 align-self-end">
                      <div class="image-frame1"></div>
                    </div>
                    <div class="col-12 align-self-end">
                      <div class="image-robot1"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3 col-8">
                <div class="d-flex my-3 mx-1">
                  <div class="my-auto p-0">
                      <ul class="me-4 p-0">
                          <li class="d-flex my-2">
                              <div>
                                <span class="icon-polygon-up"></span>
                              </div>
                          </li>
                          <li class="d-flex my-2">
                            <div class="mx-2 main-color">
                                {{$question->vote->count}}
                            </div>
                        </li>
                        <li class="d-flex my-2">
                            <div>
                              <span class="icon-polygon-down"></span>
                            </div>
                        </li>
                      </ul>
                  </div>
                  <div class="col-11 my-auto">
                    <div class="d-flex">
                      <div class="me-3">
                        <div class="my-auto avatar-crop rounded-circle bg-color-user text-center">
                          <img src="../img/avatar.png" alt="" class="img-fluid \" width="30px">
                      </div>
                      </div>
                      <div class="">
                        <h6 class="m-0">{{$question->user->name}}</h6>
                        <small class="m-0 fw-bold">Kamis, 1-7-2021</small>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card border-0 g-0">
                  <div class="m-3">
                    <div class="card-body">
                      <h5 class="card-title">{{ $question->title }}</h5>
                      <p class="card-text">{{ $question->content }}</p>
                    </div>
                  </div>
                </div>

                <div class="my-4">
                  <h5>Jawaban(1)</h5>
                </div>

                <div class="card border-0 g-0 mb-3">
                  <div class="row m-3">
                    <div class="col-12 d-flex mx-1">
                      <div class="my-auto p-0">
                          <ul class="me-4 p-0">
                              <li class="d-flex my-2">
                                  <div>
                                    <span class="icon-polygon-up"></span>
                                  </div>
                              </li>
                              <li class="d-flex my-2">
                                <div class="mx-2 main-color">
                                  1
                                </div>
                            </li>
                            <li class="d-flex my-2">
                                <div>
                                  <span class="icon-polygon-down"></span>
                                </div>
                            </li>
                          </ul>
                      </div>
                      <div class="col-11 my-auto">
                        <div class="d-flex">
                          <div class="me-3">
                            <div class="my-auto avatar-crop rounded-circle bg-color-user text-center">
                              <img src="../img/avatar.png" alt="" class="img-fluid \" width="30px">
                          </div>
                          </div>
                          <div class="">
                            <h6 class="m-0">Arsy</h6>
                            <small class="m-0 fw-bold">Kamis, 1-7-2021</small>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="card-body pt-0">
                        <div class="card-text">
                          <p class="fw-bold">Coba pakai code ini</p>
                          <p>
                            .class-yang-dipakai {
                              background-image: url("http://namadomain.com/folder image/nama-imag.jpg");
                              background-repeat: no-repeat;
                              padding-left: 18px !important;
                              background-size: 20%;
                              background-position-y: 20%;
                            }
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="my-4">
                  <h5>Jawabanmu</h5>
                </div>


                <div class="card border-0 g-0 mb-3">
                  <div class="row m-3">
                    <div class="col-12 m-4 p-0">
                      <div class="my-auto">
                        <div class="d-flex">
                          <div class="pe-3">
                            <div class="my-auto avatar-crop rounded-circle bg-color-user text-center">
                              <img src="../img/avatar.png" alt="" class="img-fluid \" width="30px">
                          </div>
                          </div>
                          <div class="my-auto">
                            <h6 class="m-0">Wiliam Thunder</h6>
                            <small class="m-0 fw-bold">Kamis, 1-7-2021</small>
                          </div>
                        </div>
                      </div>
                      </div>
                    <div class="col-12">
                      <div class="card-body pt-0">
                        <div class="row" id="box_jawaban1">
                          <div class="col-11">
                            <div class="card-text" id="jawaban1">
                              <p class="fw-bold">Coba pakai code ini</p>
                              <p>
                                .class-yang-dipakai {
                                  background-image: url("http://namadomain.com/folder image/nama-imag.jpg");
                                  background-repeat: no-repeat;
                                  padding-left: 18px !important;
                                  background-size: 20%;
                                  background-position-y: 20%;
                                }
                              </p>
                            </div>
                          </div>
                          <div class="col-1">
                            <div class="dropdown">
                              <button class="btn btn-icon" type="button" id="dots-action" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="icon-three-dots-vertical"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dots-action">
                                <li><a class="dropdown-item" href="#" onclick="editJawaban(1)">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Hapus</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card border-0 g-0 mb-3">
                  <div class="row m-3">
                    <div class="col-12 m-4 p-0">
                    <div class="my-auto">
                      <div class="d-flex">
                        <div class="pe-3">
                          <div class="my-auto avatar-crop rounded-circle bg-color-user text-center">
                            <img src="../img/avatar.png" alt="" class="img-fluid \" width="30px">
                        </div>
                        </div>
                        <div class="my-auto">
                          <h6 class="m-0">Wiliam Thunder</h6>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-12">
                      <div class="card-body pt-0">
                        <div class="row" id="box_jawaban2">
                          <div class="col-12">
                           <form action="">
                             <div class="mb-3">
                              <textarea name="" id="edit_jawaban2" cols="30" rows="10" class="form-control edit-jawaban"></textarea>
                            </div>
                            <button type="submit" class="btn btn-main-color">Submit</button>
                           </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-2">
                <div class="bg-robot-detail img-robot-detail h-100">
                  <div class="row h-100">
                    <div class="col-12 align-self-end">
                      <div class="image-frame2"></div>
                    </div>
                    <div class="col-12 align-self-end">
                      <div class="image-robot2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

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
              <form action="" class="mx-auto d-flex justify-content-between">
                <div class="d-grid mx-2">
                  <button type="button" class="btn btn-lg btn-outline-main-color px-5" data-bs-dismiss="modal">Batal</button>
                </div>
                <div class="d-grid mx-2">
                  <button type="submit" class="btn btn-lg btn-main-color px-5">Keluar</button>
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
                                <label for="upload-profile" class="d-flex justify-content-end">
                                  <img src="../img/icon/icon_edit.svg" alt="" class="image-fluid btn-edit-profile">
                                </label>
                                <input type="file" name="" id="upload-profile" class="edit-file-profile">
                              </div>
                              <div class="auto-crop">
                                <img src="../img/avatar.png" alt="" class="img-fluid">
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
      @endsection
@push('scripts')
<script>
    var jawaban = ''
    $.trumbowyg.svgPath = '../img/icon/icons.svg'
   function appendJawaban(id, jawaban){
       return `<div class="col-11">
                       <div class="card-text" id="jawaban${id}">
                         ${jawaban}
                       </div>
                       </div>
                       <div class="col-1">
                         <div class="dropdown">
                           <button class="btn btn-icon" type="button" id="dots-action" data-bs-toggle="dropdown" aria-expanded="false">
                             <span class="icon-three-dots-vertical"></span>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dots-action">
                             <li><a class="dropdown-item" href="#" onclick="editJawaban(${id})">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Hapus</a></li>
                           </ul>
                         </div>
                       </div>`
   }

   function appendEditJawaban(id, jawaban){
     return `<div class="col-12">
                        <form action="">
                          <div class="mb-3">
                           <textarea name="" id="edit_jawaban${id}" cols="30" rows="10" class="form-control edit-jawaban">${jawaban}</textarea>
                         </div>
                         <button type="submit" class="btn btn-outline-main-color" onclick="canceledJawaban(${id})">Batal</button>
                         <button type="submit" class="btn btn-main-color" onclick="replaceJawaban(${id})">Simpan</button>
                        </form>
                       </div>`
   }

   function canceledJawaban(id){
     const box = $('#box_jawaban'+id)
     box.empty()
     box.html(appendJawaban(id, jawaban))
   }

   function replaceJawaban(id){
     const box = $('#box_jawaban'+id)
     const jawaban = $('#edit_jawaban'+id).val()
     console.log(jawaban)
     box.empty()
     box.html(appendJawaban(id, jawaban))
   }

   function editJawaban(id){
     const box = $('#box_jawaban'+id)
     jawaban = $('#jawaban'+id).html()
     box.empty()
     box.append(appendEditJawaban(id, jawaban))
     richEditor()
   }

   function richEditor(){
     $('.edit-jawaban').trumbowyg({
       resetCss: true, btns: [
           ['viewHTML'],
           ['undo', 'redo'], // Only supported in Blink browsers
           ['formatting'],
           ['strong', 'em', 'del'],
           ['superscript', 'subscript'],
           ['link'],
           ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
           ['unorderedList', 'orderedList'],
           ['horizontalRule']
       ]
     })
   }
   richEditor()
 </script>
@endpush
