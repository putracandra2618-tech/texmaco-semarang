@extends('template.admin.layout')

@section('title')
  Master Category Portofolio
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('adm-categoryportofolio.store') }}"
        method="POST">
        @csrf

        <div class="form-group">
          <label for="icon">Name Category</label>
          <input type="text" class="form-control" name="name_category_portofolio" />
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
