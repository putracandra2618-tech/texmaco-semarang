@extends('template.admin.layout')

@section('title')
  Favicon
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

        @if ($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
        @endif

        @foreach ($options as $option)
          <div class="col-12">
            <form action="{{ url('favicon/' . $option->id) }}" method="POST" enctype="multipart/form-data"
              class="forms-sample">
              @method('put')
              @csrf
              <div class="form-group">
                <label class="mb-4">
                  <h5>Apakah ingin mengganti Favicon?</h5>
                </label>
                <br>

                <div class="form-group col-md-4">
                  <input type="file" name="favicon" class="dropify"
                    data-default-file="{{ asset('assets/admin/images/' . $option->favicon) }}">
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
