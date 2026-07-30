@extends('template.admin.layout')

@section('title')
Role Manager
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
        <a href="{{ route('adm-privileges.create') }}">
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
                <th width="15">No</th>
                <th width="100">Kode</th>
                <th>Nama</th>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                <th width="200">Actions</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach ($data as $data)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->level }}</td>
                <td>{{ $data->name }}</td>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                <td>
                  @if(SmtHelp::getAction("update"))
                  <a href="{{ route('adm-privileges.edit', [$data->id]) }}">
                    <button type="button" class="btn btn-outline-warning btn-rounded btn-icon">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  </a>
                  @endif
                  @if(SmtHelp::getAction("delete"))
                  <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="d-inline"
                    action="{{ route('adm-privileges.destroy', [$data->id]) }}" method="POST">

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
