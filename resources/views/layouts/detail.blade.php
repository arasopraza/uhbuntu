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
                          <img src="../img/avatar.png" alt="" class="img-fluid" width="30px">
                      </div>
                      </div>
                      <div class="">
                        <h6 class="m-0">{{$question->user->name}}</h6>
                        <small class="m-0 fw-bold">{{Helpers::parseDate($question->updated_at)}}</small>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card border-0 g-0">
                  <div class="m-3">
                    <div class="row">
                        <div class="card-body col-11">
                            <h5 class="card-title">{{ $question->title }}</h5>
                            <p class="card-text">{{ $question->content }}</p>
                          </div>
                          @if (Auth::id() == $question->user->id)
                            <div class="col-1">
                                <div class="dropdown">
                                <button class="btn btn-icon" type="button" id="dots-action" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="icon-three-dots-vertical"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dots-action">
                                    <li><a class="dropdown-item" href="#" onclick="editQuestion()">Edit</a></li>
                                    <li><a class="dropdown-item" onclick="document.querySelector('#deleteQuestion').submit()" href="#">Hapus</a></li>
                                    <form action="{{route('destroy_question', $question->id)}}" method="post" id="deleteQuestion">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    </form>
                                </ul>
                                </div>
                            </div>
                          @endif
                    </div>
                  </div>
                </div>

                <div class="my-4">
                  <h5>Jawaban({{$answer->count()}})</h5>
                </div>

                @foreach ($answer as $item)
                @if ($item->user->id == Auth::id())
                    @continue
                @else
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
                                    {{$item->vote->count}}
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
                                <img src="../img/avatar.png" alt="" class="img-fluid" width="30px">
                            </div>
                            </div>
                            <div class="">
                              <h6 class="m-0">{{$item->user->name}}</h6>
                              <small class="m-0 fw-bold">{{Helpers::parseDate($item->updated_at)}}</small>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="card-body pt-0">
                          <div class="card-text">
                            {!! $item->content !!}
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                @endif
                @endforeach
                @guest
                <div class="my-4">
                    <h5>Jawabanmu</h5>
                </div>
                <div class="card border-0 g-0 mb-3 bg-before-login-detail">
                    <div class="text-before-login-answer text-center position-absolute top-50 start-50 translate-middle">
                        <p>Kamu belum memiliki akun?</p>
                        <p>Masuk untuk membantu menjawab pertanyaan</p>
                        <a href="{{route('login')}}" class="btn btn-before-login-answer mt-3">Masuk</a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="detail-before-login1"></div>
                        <div class="detail-before-login2"></div>
                    </div>
                </div>
                @else
                    @if (Auth::user()->id != $question->user->id)
                    <div class="my-4">
                    <h5>Jawabanmu</h5>
                    </div>
                    @foreach ($answer as $item)
                    @if ($item->user->id == Auth::id())
                    <div class="card border-0 g-0 mb-3">
                        <div class="row m-3">
                        <div class="col-12 m-4 p-0">
                            <div class="my-auto">
                            <div class="d-flex">
                                <div class="pe-3">
                                <div class="my-auto avatar-crop rounded-circle bg-color-user text-center">
                                    <img src="../img/avatar.png" alt="" class="img-fluid" width="30px">
                                </div>
                                </div>
                                <div class="my-auto">
                                <h6 class="m-0">{{Auth::user()->name}}</h6>
                                <small class="m-0 fw-bold">{{Helpers::parseDate($item->updated_at)}}</small>
                                </div>
                            </div>
                            </div>
                            </div>
                        <div class="col-12">
                            <div class="card-body pt-0">
                            <div class="row" id="box_jawaban{{$item->id}}">
                                <div class="col-11">
                                <div class="card-text" id="jawaban{{$item->id}}">
                                    {!! $item->content !!}
                                </div>
                                </div>
                                <div class="col-1">
                                <div class="dropdown">
                                    <button class="btn btn-icon" type="button" id="dots-action" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="icon-three-dots-vertical"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dots-action">
                                    <li><a class="dropdown-item" href="#" onclick="editJawaban({{$item->id}})">Edit</a></li>
                                    <li><a class="dropdown-item" onclick="document.querySelector('#deleteJawaban'+{{$item->id}}).submit()" href="#">Hapus</a></li>
                                    <form action="{{route('destroy_answer', $item->id)}}" method="post" id="deleteJawaban{{$item->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                    </form>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    @else
                    @continue
                    @endif
                    @endforeach
                    <div class="card border-0 g-0 mb-3">
                        <div class="row m-3">
                        <div class="col-12 m-4 p-0">
                        <div class="my-auto">
                            <div class="d-flex">
                            <div class="pe-3">
                                <div class="my-auto avatar-crop rounded-circle bg-color-user text-center">
                                <img src="../img/avatar.png" alt="" class="img-fluid" width="30px">
                            </div>
                            </div>
                            <div class="my-auto">
                                <h6 class="m-0">{{Auth::user()->name}}</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-12">
                            <div class="card-body pt-0">
                            <div class="row" id="">
                                <div class="col-12">
                                <form action="{{route('store_answer')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                                <div class="mb-3">
                                    <textarea name="answer" cols="30" rows="10" class="form-control edit-jawaban"></textarea>
                                </div>
                                <button type="submit" class="btn btn-main-color">Submit</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                @endguest

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
                        <form action="/answer/update/${id}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                          <div class="mb-3">
                           <textarea name="content" id="edit_jawaban${id}" cols="30" rows="10" class="form-control edit-jawaban">${jawaban}</textarea>
                         </div>
                         <button type="button" class="btn btn-outline-main-color" onclick="canceledJawaban(${id})">Batal</button>
                         <button type="submit" class="btn btn-main-color">Simpan</button>
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
