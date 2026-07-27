@extends('masterweb::template.admin.layout')

@section('title')
  Sosmed
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="d-flex">
        <div class="mr-auto p-2">
          {{-- <div id="datepicker-popup" class="input-group date datepicker">
                <input type="text" class="form-control">
                <span class="input-group-addon input-group-append border-left">
                    <span class="far fa-calendar input-group-text"></span>
                </span>
            </div> --}}
        </div>
        <div class="p-2">
          @if(SmtHelp::getAction("create"))
          <a href="{{ route('admsosmed.create') }}">
            <button type="button" class="btn btn-info btn-icon-text">
              Tambah Data
              <i class="fa fa-plus btn-icon-append"></i>
            </button>
          </a>
          @endif
        </div>
      </div>

      <div class="row">
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Link</th>
                  <th>icon</th>
                  <th>url</th>
                  @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                  <th>Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($datas as $data)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->link }}</td>
                    <td>{{ $data->icon }}</td>
                    <td>{{ $data->url }}</td>
                    @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                    <td>
                      <a href="{{ route('admsosmed.show', [$data->id]) }}">
                        <button type="button" class="btn btn-info btn-rounded btn-icon" data-toggle="tooltip"
                          data-custom-class="tooltip-info" data-placement="top" title="Lihat Data">
                          <i class="fa fa-eye"></i>
                        </button>
                      </a>
                      @if(SmtHelp::getAction("update"))
                      <a href="{{ route('admsosmed.edit', [$data->id]) }}">
                        <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="tooltip"
                          data-custom-class="tooltip-dark" data-placement="top" title="Edit Data">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      </a>
                      @endif
                      @if(SmtHelp::getAction("delete"))
                      <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                        class="d-inline" action="{{ route('admsosmed.destroy', [$data->id]) }}" method="POST">

                        @csrf

                        <input type="hidden" name="_method" value="DELETE">

                        <button type="submit" class="btn btn-outline-danger btn-rounded btn-icon">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                      @endif
                    </td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
