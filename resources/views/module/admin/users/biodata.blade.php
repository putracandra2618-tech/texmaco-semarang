@extends('template.admin.layout')

@section('title')
  Update Biodata
@endsection

@section('breadcrumb-active')
  upadate biodata
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Biodata</h4>
      <p class="card-description">
        edit biodata
      </p>
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif

      <form enctype="multipart/form-data" class="forms-sample" action="{{ url('biodata/' . $user->id) }}"
        method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Input name"
            value="{{ $user->name }}">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Input email"
            value="{{ $user->email }}">
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Input username"
            value="{{ $user->username }}">
        </div>

        <div class="form-group col-md-4">
          <label for="">Foto Profile</label>
          <input type="file" name="photo" class="dropify"
            data-default-file="{{ asset('assets/admin/images/photo/' . $user->photo) }}">
        </div>

        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
      </form>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
@endsection
