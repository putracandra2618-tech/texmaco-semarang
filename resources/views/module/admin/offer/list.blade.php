@extends('template.admin.layout')

@section('title')
  Offer
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
            {{-- <a href="{{route('admoffer.create')}}">
              <button type="submit" class="btn btn-info mb-2"><i class="fa fa-plus-circle mr-2"></i>Tambah Data</button>
            </a> --}}
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
                  <th>Nama Klien</th>
                  <th>Nama Proyek</th>
                  <th>Deadline</th>
                  <th>Contact</th>
                  <th>Created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($datas as $data)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nama_proyek }}</td>
                    <td>{{ SmtHelp::fdate($data->deadline, 'DDMMYYYY') }}</td>
                    <td>{{ $data->phone }} <br> {{ $data->email }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                      <a href="{{ route('admoffer.show', [$data->id]) }}">
                        <button type="button" class="btn btn-info btn-rounded btn-icon" data-toggle="tooltip"
                          data-custom-class="tooltip-info" data-placement="top" title="Lihat Data">
                          <i class="fa fa-eye"></i>
                        </button>
                      </a>
                      {{-- <a href="{{route('admoffer.edit', [$data->id])}}">
                          <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="tooltip" data-custom-class="tooltip-dark" data-placement="top" title="" data-original-title="Edit Data">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                        </a> --}}

                      {{-- <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="d-inline" action="{{route('admoffer.destroy', [$data->id])}}" method="POST">

                          @csrf

                          <input type="hidden" name="_method" value="DELETE">

                          <button type="submit" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip" data-custom-class="tooltip-danger" data-placement="top" title="Hapus Data">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form> --}}
                    </td>
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
