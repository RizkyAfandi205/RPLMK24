@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="d-flex align-items-center">
        <h2>Album: {{ $user }}</h2>
    </div>
    <hr class="hr">

    <div class="row mt-2">
        @if($count > 0)
            @foreach($data as $data)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-2">
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="box">
                    <img src="{{ asset('images/'. $data->gambar) }}" alt="">
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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $data->judul }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-flex p-2">
                                    <div class="col-lg-7 col-12 text-center">
                                        <img class="rounded" src="{{ asset('images/'. $data->gambar) }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-5 col-12 mt-2">
                                        <div class="card-title" style="margin-top: 1px"> 
                                            <b>{{ $data->username }}</b> -
                                            {{ $data->deskripsi }}
                                        </div>
                                        <div class="foot mt-2">
                                            <a class="kategori" href="/kategori/{{ $data->kategori }}">#{{ $data->kategori }}</a>
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
            <p class="text-center text-secondary mt-3">User ini belum mengupload apapun</p>
        @endif
    </div>
    <div class="d-flex">
        <a href="/" class="ms-auto"><i class="fas fa-backward me-2 mt-3"></i>Back to Home</a>
    </div>
</div>
@endsection