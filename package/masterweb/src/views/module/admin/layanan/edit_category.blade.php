@extends('masterweb::template.admin.layout')
@section('title')
  Master Category Layanan
@endsection

@section('breadcrumb-active')
  edit
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample"
        action="{{ route('adm-categorylayanan.update', [$data->id_category_layanan]) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <div class="form-group">
          <label for="icon">Name Category</label>
          <input type="text" class="form-control" name="nama_layanan" value="{{ $data->nama_layanan }}" />
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
        <a href="{{ url('/adm-categorylayanan') }}" class="btn btn-light">Kembali</a>
      </form>
    </div>
  </div>
@endsection
