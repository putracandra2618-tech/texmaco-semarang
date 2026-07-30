@extends('template.admin.layout')

@section('title')
Module Layout
@endsection

@section('breadcrumb-active')
create
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <form class="forms-sample" action="{{ route('module-layout.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama Module Layout</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Module Layout">
      </div>

      <div class="form-group">
        <label for="name">Folder Module Layout</label>
        <input type="text" class="form-control" id="module" name="module" placeholder="Nama Folder Module Layout">
      </div>




      <button type="submit" class="btn btn-primary mr-2">Simpan</button>
      <a href="/module-layout" class="btn btn-light">Kembali</a>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
@endsection