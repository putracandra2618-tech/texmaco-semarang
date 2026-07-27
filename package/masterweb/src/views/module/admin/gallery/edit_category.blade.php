@extends('masterweb::template.admin.layout')
@section('title')
Data Album
@endsection

@section('breadcrumb-active')
  edit
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample"
        action="{{ route('adm-album.update', [$album->id]) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <div class="form-group">
          <label for="icon">Nama Album</label>
          <input type="text" class="form-control" name="nama"
            value="{{ $album->nama }}" />
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
