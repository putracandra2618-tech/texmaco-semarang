@extends('masterweb::template.admin.layout')

@section('title')
  Master Category Layanan
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('adm-categorylayanan.store') }}"
        method="POST">
        @csrf

        <div class="form-group">
          <label for="icon">Name Layanan</label>
          <input type="text" class="form-control" name="nama_layanan" />
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
