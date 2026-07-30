@extends('template.admin.layout')

@section('title')
  Master Testimoni
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('adm-testimoni.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" class="form-control" name="name_testimoni">
        </div>
        <div class="form-group">
          <label for="">Testimoni</label>
          <textarea name="description_testimoni" id="description_testimoni" class="form-control texteditor" cols="30"
            rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="icon">Gambar testimoni</label>
          <input type="file" class="dropify" name="file_testimoni" />
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
        <a href="adm-testimoni" class="btn btn-light">Kembali</a>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
@endsection
