@extends('masterweb::template.admin.layout')
@section('title')
  Master Client
@endsection

@section('breadcrumb-active')
  edit
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample"
        action="{{ route('adm-client.update', [$client->id_client]) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <div class="form-group">
          <label for="icon">Urutan</label>
          <input type="number" class="form-control" name="urutan" value={{ $client->urutan }} />
        </div>

        <div class="form-group">
          <label for="icon">Gambar Client</label>
          <input type="file" class="dropify" name="file_client"
            data-default-file="{{ asset('assets/public/images/client/' . $client->file_client) }}" />
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
