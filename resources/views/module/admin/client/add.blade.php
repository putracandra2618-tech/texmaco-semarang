@extends('template.admin.layout')

@section('title')
  Master Client
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('adm-client.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="icon">Urutan</label>
          <input type="number" class="form-control" name="urutan" />
        </div>

        <div class="form-group">
          <label for="icon">Gambar Client</label>
          <input type="file" class="dropify" name="file_client" />
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
