@extends('template.admin.layout')

@section('title')
  Logo
@endsection

@section('breadcrumb-active')
  edit
@endsection

@section('content')
  <div class="card">
    <div class="card-body">


      <div class="row">

        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        @foreach ($options as $option)
          <div class="col-12">
            <form action="/logo/{{ $option->id }}" method="POST" enctype="multipart/form-data" class="forms-sample">
              @method('patch')
              @csrf
              <div class="form-group">
                <label class="mb-4">
                  <h5>Apakah ingin mengganti Logo?</h5>
                </label>
                <br>
                <div class="form-group col-md-4">
                  <input type="file" name="logo" class="dropify"
                    data-default-file="{{ asset('assets/public/images/logo/' . $option->logo) }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        @endforeach
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
@endsection
