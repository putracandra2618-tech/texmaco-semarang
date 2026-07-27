@extends('masterweb::template.admin.layout')

@section('title')
  Sosmed
@endsection

@section('breadcrumb-active')
  deatail
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" value="{{ $data->icon }}" readonly>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $data->link }}" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Url">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ $data->url }}" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
