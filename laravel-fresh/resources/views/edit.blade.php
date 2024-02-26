@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
  <div class="d-flex">
    <h2>Edit Page</h2>
  </div>
  <div class="conatiner mt-2 border border-1 rounded bg-body-tertiary">
    @foreach ($data as $data)
    <form class="p-5" method="post" enctype="multipart/form-data" action="/edit/data">
        @csrf
        <input type="hidden" name="album_id" value="{{ $data->album_id }}">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <input type="hidden" name="gambar" value="{{ $data->gambar }}">
      <div class="mb-3">
        <label class="form-label">Judul Foto:</label>
        <input type="text" class="form-control" value="{{ $data->judul }}" name="judul" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi:</label>
        <textarea class="form-control" name="deskripsi" required>{{ $data->deskripsi }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori:</label>
        <select class="form-select" name="kategori">
          <option value="art" @if( $data->kategori == "art") selected @endif>Art</option>
          <option value="sport" @if( $data->kategori == "sport") selected @endif>Sport</option>
          <option value="pet" @if( $data->kategori == "pet") selected @endif>Pet</option>
          <option value="view" @if( $data->kategori == "view") selected @endif>View</option>
          <option value="food" @if( $data->kategori == "food") selected @endif>Food</option>
          <option value="quote" @if( $data->kategori == "quote") selected @endif>quote</option>
        </select>
      </div>
      <div class="d-flex">
        <a class="btn btn-secondary me-2" href="/my_posts">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    @endforeach
  </div>
</div>
@endsection