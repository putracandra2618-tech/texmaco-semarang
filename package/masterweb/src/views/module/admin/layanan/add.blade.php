@extends('masterweb::template.admin.layout')

@section('title')
  Layanan
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('admlayanan.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">tampilkan pada menu</label>
          <select name="menu_id" id="menu_id" class="form-control">
            <option value="">pilih menu</option>
            @foreach ($menupublic as $menu)
              <option value="{{ $menu->id }}">{{ $menu->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="title">Judul</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Judul">
        </div>

        <div class="form-group">
          <label for="link_url">link Url</label>
          <input type="text" class="form-control" id="link_url" name="link_url" placeholder="Link Url">
        </div>

        <div class="form-group card col-md-12">
          <label for="">Deskripsi</label>
          <textarea name="deskripsi" id="summernote"></textarea>
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="dropify" name="image" />
        </div>

        <div class="form-group">
          <label for="urutan">Urutan</label>
          <input type="number" min="0" class="form-control" id="urutan" name="urutan" placeholder="urutan">
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
        <button class="btn btn-light">Kembali</button>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    function toSeoUrl(url) {
      return url.toString() // Convert to string
        .normalize('NFD') // Change diacritics
        .replace(/[\u0300-\u036f]/g, '') // Remove illegal characters
        .replace(/\s+/g, '-') // Change whitespace to dashes
        .toLowerCase() // Change to lowercase
        .replace(/&/g, '-and-') // Replace ampersand
        .replace(/[^a-z0-9\-]/g, '') // Remove anything that is not a letter, number or dash
        .replace(/-+/g, '-') // Remove duplicate dashes
        .replace(/^-*/, '') // Remove starting dashes
        .replace(/-*$/, ''); // Remove trailing dashes
    }
    $(document).ready(function() {
      $('#title').keyup(function() {
        $('#link_url').val(toSeoUrl($('#title').val()));
      });
    });
    $(document).ready(function() {
      $('#title').keyup(function() {
        $('#link_url').val(toSeoUrl($('#title').val()));
      });
      if ($("#summernote").length) {
        $('#summernote').summernote({
          height: 300,
          tabsize: 2
        });
      }
    });
  </script>

  <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#btn-add').click(function() {
        var markup =
          '<tr><td><input type="text" name="fitur[]" id="fitur" class="form-control"></td><td><button type="button" id="btn-remove" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
        $('table tbody').append(markup);
      });
      $('#fitur').on('click', '#btn-remove', function() {
        $(this).parent().parent().remove();
      })
    });
  </script>
@endsection
