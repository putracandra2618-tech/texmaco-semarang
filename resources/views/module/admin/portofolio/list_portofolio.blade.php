@extends('template.admin.layout')

@section('title')
  Master Portofolio
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex">
      <div class="mr-auto p-2">
      
      </div>

      <div class="p-2">
        <div class="">
          @if(SmtHelp::getAction("create"))
          <a href="{{route('adm-portofolio.create')}}">
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
                <th>No</th>
                <th>Images</th>
                <th>Name</th>
                <th>Category</th>
                <th>Technology</th>
                <th>Descipton</th>
                <th>Publish</th>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                <th>Actions</th>
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
                <td><a href="{{asset('assets/public/images/portofolio/'.$data->file_portofolio)}}" target="_blank"><img src="{{asset('assets/public/images/portofolio_thumb/'.$data->file_portofolio)}}"></a></td>
                <td><a href=" {{ $data->link_portofolio }} "> {{ Str::ucfirst($data->name_portofolio) }} </a></td>
                <td> {{ !empty($data->category_portofolio->name_category_portofolio) ? $data->category_portofolio->name_category_portofolio : "-" }} </td>
                <td> {{ $data->tech_portofolio }} </td>
                <td> {!! substr($data->desc_portofolio, 0,100) !!}... </td>                
                <td><label class="badge badge-info"></label>
                  @if ($data->publish == 1)
                  <a href="{{url('adm-portofolio/publish/'.$data->id_portofolio)}}"><label class="badge badge-info">Aktif</label></a>
                  @else
                  <a href="{{url('adm-portofolio/publish/'.$data->id_portofolio)}}"><label class="badge badge-danger">Tidak Aktif</label></a>
                  @endif
                </td>
                @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                <td>
                  @if(SmtHelp::getAction("update"))
                  <a href="{{route('adm-portofolio.edit', [$data->id_portofolio])}}">
                    <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="tooltip" data-custom-class="tooltip-dark" data-placement="top" title="" data-original-title="Edit Data">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  </a>
                  @endif
                  @if(SmtHelp::getAction("delete"))
                  <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="d-inline" action="{{route('adm-portofolio.destroy', [$data->id_portofolio])}}" method="POST">

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
