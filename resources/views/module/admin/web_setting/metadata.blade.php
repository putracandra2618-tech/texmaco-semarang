@extends('template.admin.layout')

@section('title')
  Metadata
@endsection

@section('breadcrumb-active')
  edit
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
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

      @foreach ($options as $option)
        <form enctype="multipart/form-data" class="forms-sample" action="{{ url('metadata/' . $option->id) }}"
          method="POST">
          @csrf
          <input type="hidden" value="PUT" name="_method">

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Input Title"
              value="{{ $option->title }}">
          </div>

          <div class="form-group">
            <label for="slogan">Slogan</label>
            <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Input Slogan"
              value="{{ $option->slogan }}">
          </div>

          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="texteditor form-control" cols="30"
              rows="10">{{ $option->description }}</textarea>
          </div>

          <div class="form-group">
            <label for="keyword">Keyword</label>
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Input keyword"
              value="{{ $option->keyword }}">
          </div>

          <div class="form-group">
            <label for="footer">Footer</label>
            <input type="text" class="form-control" id="footer" name="footer" placeholder="Input footer"
              value="{{ $option->footer }}">
          </div>

          <div class="form-group">
            <label for="footer">SEO SCRIPT (Google Analitic, Facebook Pixels)</label>
            <textarea name="seo_script" class="form-control">{{ $option->script_option }}</textarea>
          </div>
      @endforeach

      <button type="submit" class="btn btn-primary mr-2">Simpan</button>
      <button class="btn btn-light">Kembali</button>
      </form>
    </div>
  </div>
@endsection
