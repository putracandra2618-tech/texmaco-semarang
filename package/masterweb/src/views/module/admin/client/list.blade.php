@extends('masterweb::template.admin.layout')

@section('title')
Master Client
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
        <div class="">
          @if(SmtHelp::getAction("create"))
          <a href="{{ route('adm-client.create') }}">
            <button type="submit" class="btn btn-info mb-2"><i class="fa fa-plus-circle mr-2"></i>Tambah Data</button>
          </a>
          @endif
        </div>
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
                <th>Urutan</th>
                <th>Images</th>
                <th>Publish</th>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                  <th>Actions</th>
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
                <td>{{ $data->urutan }}</td>
                <td><a href="{{ asset('assets/public/images/client/' . $data->file_client) }}" target="_blank"><img
                      src="{{ asset('assets/public/images/client/' . $data->file_client) }}"></a></td>
                <td><label class="badge badge-info"></label>
                  @if ($data->publish == 1)
                  <a href="{{ url('adm-client/publish/' . $data->id_client) }}"><label
                      class="badge badge-info">Aktif</label></a>
                  @else
                  <a href="{{ url('adm-client/publish/' . $data->id_client) }}"><label class="badge badge-danger">Tidak
                      Aktif</label></a>
                  @endif
                </td>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                <td>
                  @if(SmtHelp::getAction("update"))
                  <a href="{{ route('adm-client.edit', [$data->id_client]) }}">
                    <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="tooltip"
                      data-custom-class="tooltip-dark" data-placement="top" title="" data-original-title="Edit Data">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  </a>
                  @endif
                  @if(SmtHelp::getAction("delete"))
                  <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="d-inline"
                    action="{{ route('adm-client.destroy', [$data->id_client]) }}" method="POST">

                    @csrf

                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip"
                      data-custom-class="tooltip-danger" data-placement="top" title="Hapus Data">
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
@endsection