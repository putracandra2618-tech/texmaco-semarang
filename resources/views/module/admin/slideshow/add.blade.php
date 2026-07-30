@extends('template.admin.layout')

@section('title')
  Master Slideshow
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('admslideshow.store') }}"
        method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nama Slideshow</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nama Slideshow">
        </div>

        <div class="form-group">
          <label for="name">Deskripsi</label>
          <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <label for="icon">Gambar Slideshow</label>
          <input type="file" class="dropify" name="images" />
        </div>

        <div class="form-group">
          <label for="name">Url</label>
          <input type="text" class="form-control" id="url" name="url" placeholder="isi jika tidak url..">
        </div>

        <div class="form-group">
          <label for="name">Urutan</label>
          <input type="text" class="form-control" id="order" name="order" placeholder="order">
        </div>


        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif


        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        <a href="/admslideshow" class="btn btn-light">Kembali</a>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
@endsection
