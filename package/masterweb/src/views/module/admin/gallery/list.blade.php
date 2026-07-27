@extends('masterweb::template.admin.layout')

@section('title')
  Data Galeri
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex">
      <div class="mr-auto p-2">
        <b>Nama Album :</b> {{$album->nama}}
      </div>

      <div class="p-2">
        <div class="">
          @if(SmtHelp::getAction("create"))
          <a href="{{route('adm-gallery.create',['album'=>$album->id])}}">
            <button type="submit" class="btn btn-info mb-2"><i class="fa fa-plus-circle mr-2"></i>Tambah Data</button>
          </a>
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
      @endif
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Images</th>
                <th>Name</th>
                <th>Publish</th>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                <th width="20%">Aksi</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @php
              $no=1;
            //   dd($data);
              @endphp
              @foreach ($data as $data)
              <tr>
                <td>{{$no++}}</td>
                <td><a href="{{asset('assets/public/images/photos'.$data->images)}}" target="_blank"><img src="{{asset('assets/public/images/photos/'.$data->images)}}"></a></td>
                <td><a href=" {{ $data->link }} "> {{ Str::ucfirst($data->nama) }} </a></td>
                <td><label class="badge badge-info"></label>
                  @if ($data->publish == 1)
                  <a href="{{url('adm-gallery/publish/'.$data->id)}}"><label class="badge badge-info">Aktif</label></a>
                  @else
                  <a href="{{url('adm-gallery/publish/'.$data->id)}}"><label class="badge badge-danger">Tidak Aktif</label></a>
                  @endif
                </td>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                <td>
                  @if(SmtHelp::getAction("update"))
                  <a href="{{route('adm-gallery.edit', [$data->id,'album'=>$album->id])}}">
                    <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="tooltip" data-custom-class="tooltip-dark" data-placement="top" title="" data-original-title="Edit Data">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  </a>
                  @endif
                  @if(SmtHelp::getAction("delete"))
                  <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="d-inline" action="{{route('adm-gallery.destroy', [$data->id,'album'=>$album->id])}}" method="POST">

                    @csrf

                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip" data-custom-class="tooltip-danger" data-placement="top" title="Hapus Data">
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
