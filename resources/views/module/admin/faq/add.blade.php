@extends('template.admin.layout')

@section('title')
  Master FAQ
@endsection

@section('breadcrumb-active')
  create
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample" action="{{ route('adm-faq.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Question</label>
          <input type="text" class="form-control" id="question" name="question" placeholder="Question">
        </div>

        <div class="form-group">
          <label for="name">Answer</label>
          <textarea name="answer" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <label for="name">Urutan</label>
          <input type="text" class="form-control" id="ordered" name="ordered" placeholder="Urutan">
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
