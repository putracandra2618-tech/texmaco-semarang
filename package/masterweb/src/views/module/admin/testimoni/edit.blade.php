@extends('masterweb::template.admin.layout')
@section('title')
  Master Testimoni
@endsection

@section('breadcrumb-active')
  edit
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample"
        action="{{ route('adm-testimoni.update', [$testimoni->id_testimoni]) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" class="form-control" value="{{ $testimoni->name_testimoni }}" name="name_testimoni">
        </div>
        <div class="form-group">
          <label for="">Testimoni</label>
          <!-- <input type="text" class="form-control" value="{{ $testimoni->description_testimoni }}" name="description_testimoni"> -->
          <textarea name="description_testimoni" id="description_testimoni" class="form-control texteditor" cols="30"
            rows="10">{{ $testimoni->description_testimoni }}</textarea>
        </div>

        <div class="form-group">
          <label for="icon">Gambar testimoni</label>
          <input type="file" class="dropify" name="file_testimoni"
            data-default-file="{{ asset('assets/public/images/testimoni/' . $testimoni->file_testimoni) }}" />
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
  <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
@endsection
