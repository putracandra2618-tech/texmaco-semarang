@extends('masterweb::template.admin.layout')

@section('title')
  Data Album Galeri
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="d-flex">
        <div class="mr-auto p-2">

        </div>

        <div class="p-2">
          @if(SmtHelp::getAction("create"))
            <a href="{{ route('adm-album.create') }}">
              <button type="submit" class="btn btn-info mb-2"><i class="fa fa-plus-circle mr-2"></i>Tambah Data</button>
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
                  <th>Nama Album</th>
                  <th>Link</th>
                  @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                  <th>Aksi</th>
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
                    <td> {{ ucfirst($data->nama) }} </td>
                    <td>{{$data->link}}</td>
                    @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                    <td>
                      <a href="{{route('adm-gallery.list', [$data->id])}}">
                        <button type="button" class="btn btn-info btn-rounded btn-icon" data-toggle="tooltip" data-custom-class="tooltip-dark" data-placement="top" title="" data-original-title="Data Photo">
                          <i class="fa fa-list"></i>
                        </button>
                      </a>
                      @if(SmtHelp::getAction("update"))
                      <a href="{{ route('adm-album.edit', [$data->id]) }}">
                        <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="tooltip"
                          data-custom-class="tooltip-dark" data-placement="top" title=""
                          data-original-title="Edit Data">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      </a>
                      @endif
                      @if(SmtHelp::getAction("delete"))
                      <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                        class="d-inline"
                        action="{{ route('adm-album.destroy', [$data->id]) }}"
                        method="POST">

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
  </div>
@endsection
