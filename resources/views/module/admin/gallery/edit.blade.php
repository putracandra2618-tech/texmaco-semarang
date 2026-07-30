@extends('template.admin.layout')

@section('title')
  Data Photo
@endsection

@section('breadcrumb-active')
  edit
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <form enctype="multipart/form-data" class="forms-sample"
        action="{{ route('adm-gallery.update', [$data->id]) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <div class="form-group">
          <label for="">Album</label>
          <input type="text" value="{{$album->nama}}" class="form-control" readonly> 
        </div>

        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" value="{{$data->nama}}">
        </div>

        <div class="form-group">
          <label for="">Deskripsi</label>
          <textarea name="isi" id="isi" class="form-control texteditor" cols="30" rows="10">{!!$data->isi!!}</textarea>
        </div>

        <div class="form-group">
          <label for="icon">Gambar</label>
          <input type="file" class="dropify" name="file"
            data-default-file="{{ asset('assets/public/images/photos/' . $data->images) }}" />
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

@section('scripts')
  <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
@endsection
