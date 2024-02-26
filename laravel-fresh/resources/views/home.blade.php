@extends('layouts.app')

@section('content')
<style>
    .modal-footer .btn i{
        font-size: 30px;
    }
    .modal-footer .btn i:hover{
        font-size: 30px;
        color: red;
        transition: 0.6s ease;
    }
</style>
<!-- Kategori -->
<div class="kategori container mt-5 pt-3">
  <h2 class="mt-4">Category</h2>
  <div class="rounded mb-5 mt-2 p-3 bg-body-secondary">
    <div class="row d-flex justify-content-center text-center p-3">
      <a href="/kategori/art" class="col-md-4 col-6 text-dark mt-4">
        <i class="fas fa-paint-brush" style="font-size: 30px"></i>
        <p>Art</p>
      </a>
      <a href="/kategori/sport" class="col-md-4 col-6 text-dark mt-4">
        <i class="fas fa-volleyball-ball" style="font-size: 30px"></i>
        <p>Sport</p>
      </a>
      <a href="/kategori/pet" class="col-md-4 col-6 text-dark mt-4">
        <i class="fas fa-cat" style="font-size: 30px"></i>
        <p>Pet</p>
      </a>
      <a href="/kategori/view" class="col-md-4 col-6 text-dark mt-4">
        <i class="fas fa-mountain" style="font-size: 30px"></i>
        <p>View</p>
      </a>
      <a href="/kategori/food" class="col-md-4 col-6 text-dark mt-4">
        <i class="fas fa-hamburger" style="font-size: 30px"></i>
        <p>Food</p>
      </a>
      <a href="/kategori/quote" class="col-md-4 col-6 text-dark mt-4">
        <i class="fas fa-quote-right" style="font-size: 30px"></i>
        <p>Quote</p>
      </a>
    </div>
  </div>
</div>
<!-- End Kategori -->

<div class="container">
  <div class="d-flex">
    <h2>Last Post <i class="fas fa-fire" style="color: #ff6600"></i></h2>
    <!-- Upload -->
    <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#upload"><i class="fas fa-plus me-2"></i>Tambah</button>

    <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="was-validated" action="/upload/data">
                @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="col-form-label">Judul Foto:</label>
                    <input type="text" class="form-control" name="judul" required>
                    <div class="invalid-feedback">
                        Masukkan Judul Terlebih Dahulu!
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Deskripsi:</label>
                    <textarea class="form-control" name="deskripsi" required></textarea>
                    <div class="invalid-feedback">
                        Masukkan Deskripsi Terlebih Dahulu!
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Kategori:</label>
                    <select class="form-select" name="kategori" required aria-label="select example">
                        <option value="" selected disabled>~ Pilih Kategori ~</option>
                        <option value="art">art</option>
                        <option value="sport">sport</option>
                        <option value="pet">pet</option>
                        <option value="view">view</option>
                        <option value="food">food</option>
                        <option value="quote">quote</option>
                    </select>
                    <div class="invalid-feedback">Pilih Kategori Terlebih Dahulu!</div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Gambar:</label>
                    <input class="form-control" type="file" name="gambar" required="required">
                    <div class="invalid-feedback">
                        Masukkan Gambar Terlebih Dahulu!
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <!-- End Upload -->
  </div>
  <div class="row mt-2">
    @if ($count > 0)
        @foreach ($data as $data)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-2">
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $target_modal++ }}">
                <div class="box">
                    <img src="{{ asset('images/'.$data->gambar) }}" alt="">
                    <div class="box-overlay"></div>
                    <div class="box-content">
                        <div class="inner-content">
                            <h3 class="title">{{ $data->username }}</h3>
                            <span class="post">{{ $data->updated_at }}</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $id_modal++ }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $data->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex p-2">
                                <div class="col-lg-7 col-12 text-center">
                                    <img class="rounded" src="{{ asset('images/'.$data->gambar) }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-5 col-12 mt-2">
                                    <div class="card-title" style="margin-top: 1px"> 
                                        <a class="fw-bold" href="@if($data->username == Auth::user()->username) /my_posts @else /{{ $data->username }} @endif">{{ $data->username }}</a> -
                                        {{ $data->deskripsi }}
                                    </div>
                                    <div class="foot mt-2">
                                        <a class="kategori" href="kategori/{{ $data->kategori }}">#{{ $data->kategori }}</a>
                                        <p class="text-secondary fst-italic">{{ $data->updated_at }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p class="text-center text-secondary mt-5">Tidak Ada Apapun Disini</p>
    @endif
  </div>
</div>
@endsection
