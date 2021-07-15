@extends('layouts/main')

@section('title', 'Uhbuntu')

@section('container')
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
            <form action="{{route('search_pages')}}" class="row pt-3 pb-3" method="GET">
                <div class="col-md-9">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" style="border: 0; background-color: #fff;" id="basic-addon1"><i class="icon-search"></i></span>
                        <input type="text" name="q" class="form-control border-0 search-jawaban" placeholder="Cari jawabanmu disini">
                        <input type="submit" style="width: 0; height: 0; display: none">
                      </div>
                  </div>
                  <div class="col-md-3 d-grid">
                  @guest
                    <button type="button" class="btn btn-lg btn-main-color btn-jawaban" data-bs-toggle="modal" data-bs-target="#modalMasuk">Tulis pertanyaanmu</button>
                  @else
                    <button type="button" class="btn btn-lg btn-main-color btn-jawaban" data-bs-toggle="modal" data-bs-target="#modalPertanyaan">Tulis pertanyaanmu</button>
                  @endguest
                  </div>
            </form>

          @foreach ($question as $items)
            <div class="card border-0 mb-3">
                <div class="row g-0 m-3">
                  <div class="col-md-2 my-auto mx-auto">
                      <ul>
                          <li class="d-flex my-2">
                              <div>
                                <img src="img/icon/icon_dipilih.svg" alt="" class="img-fluid">
                              </div>
                              <div class="ms-3 mt-1 mb-1">
                                  <p class="m-0 my-auto">{{$items->vote->count }} Dipilih</p>
                              </div>
                          </li>
                          <li class="d-flex my-2">
                            <div>
                              <img src="img/icon/icon_jawab.svg" alt="" class="img-fluid">
                            </div>
                            <div class="ms-3 mt-1 mb-1">
                                <p class="m-0 my-auto">{{$items->answer->count()}} Jawaban</p>
                            </div>
                        </li>
                        <li class="d-flex my-2">
                            <div>
                              <img src="img/icon/icon_mata.svg" alt="" class="img-fluid">
                            </div>
                            <div class="ms-3 mt-1 mb-1">
                                <p class="m-0 my-auto">{{ $items->view->count }} Dilihat</p>
                            </div>
                        </li>
                      </ul>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $items->title }}</h5>
                      <p class="card-text">{{ $items->content }}</p>
                    </div>
                  </div>
                  <div class="col-md-2 my-auto">
                      <div class="text-center">
                        <a href="/questions/{{ $items->id }}" class="fw-bolder main-color">Tampilkan</a>
                      </div>
                    </div>
                </div>
              </div>
              @endforeach
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
                <form action="{{route('store_question')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="text-center mb-5">
                        <h3>Pertanyaan</h3>
                    </div>
                    <div class="container">
                        <div class="mb-5">
                            <div class="mb-3">
                                <label for="" class="mb-2">Judul Pertanyaan</label>
                                <input type="text" class="form-control" name="title" placeholder="Masukkan judul pertanyaanmu disini">
                            </div>
                            <div class="mb-3">
                                <label for="" class="mb-2">Penjelasan Pertanyaan</label>
                                <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Masukkan penjelasan pertanyaanmu disini"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="mb-2">Tag</label>
                                <input type="text" class="form-control tagin" name="tags" data-placeholder="Masukkan tag pertanyaanmu disini (maksimal 5 tags)">
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

      <div class="modal fade" id="modalMasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog rounded-1">
          <div class="modal-content">
              <div class="row justify-content-end m-2">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body" style="padding-top: 0;">
              <div class="container">
                <div class="text-center mb-2">
                  <img src="{{asset('img/robot_before_auth.png')}}" alt="" class="img-fluid">
                  <div class="mt-3">
                    <h4>Belum memiliki akun?</h4>
                  <small>Login untuk melakukan aktivitas
                    anda</small>
                  </div>
              </div>
              </div>
            </div>
            <div class="modal-footer" style="border: none;">
              <div class="mx-auto mb-5">
                <a href="/login" class="btn btn-lg btn-main-color btn-masuk" style="padding-top: 14px">Masuk</a>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('scripts')
<script>
    const tags = $('.tagin')[0]
    tagin(tags)
</script>
@endpush
