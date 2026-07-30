@extends('template.admin.layout')

@section('title')
  Sosmed
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('admsosmed.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="icon">Icon</label>
              <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="link">Link</label>
              <input type="text" class="form-control" id="link" name="link" placeholder="Link">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="Url">Url</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="url">
            </div>
          </div>
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
    </div>
  </div>
  </div>
  </form>
  </div>
  </div>
@endsection
