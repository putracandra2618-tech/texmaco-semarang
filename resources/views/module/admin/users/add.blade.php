@extends('template.admin.layout')
@section('title')
  User Management
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('adm-users.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap">
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>

        <div class="form-group">
          <label for="email">Alamat email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>

        <div class="form-group">
          <label for="email">Hak Akses</label>
          <select name="level" id="level" class="form-control">
            @foreach ($privileges as $privilege)
              <option value="{{ $privilege->id }}">{{ $privilege->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="email">Photo</label>
          <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        <button class="btn btn-light">Kembali</button>
      </form>
    </div>
  </div>
@endsection
